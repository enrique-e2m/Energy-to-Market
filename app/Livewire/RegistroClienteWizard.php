<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Documento;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class RegistroClienteWizard extends Component
{
    use WithFileUploads;

    public $step = 1;
    public $totalSteps = 3;

    // Seguimiento de progreso
    public $completedSteps = [];
    public $maxCompletedStep = 0;

    // Paso 1: credenciales y documentos
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $acta_constitutiva;
    public $poderes;
    public $constancia_fiscal;
    public $ine;
    public $opinion_d32;

    // Paso 2: centros
    public $centros = [];

    // Persistimos sólo el ID del usuario entre requests (tras finalizar)
    public $userId;

    protected function rules()
    {
        return match ($this->step) {
            1 => $this->step1Rules(),
            2 => $this->centrosRules(),
            default => [],
        };
    }

    protected function step1Rules()
    {
        return [
            'name'               => 'required|string|max:255',
            'email'              => 'required|email|unique:users,email',
            'password'           => 'required|min:8|confirmed',
            'acta_constitutiva'  => 'required|file|mimes:pdf|max:2048',
            'poderes'            => 'required|file|mimes:pdf|max:2048',
            'constancia_fiscal'  => 'required|file|mimes:pdf|max:2048',
            'ine'                => 'required|file|mimes:pdf|max:2048',
            'opinion_d32'        => 'required|file|mimes:pdf|max:2048',
        ];
    }

    protected function centrosRules()
    {
        $rules = [];
        foreach ($this->centros as $i => $c) {
            $p = "centros.$i";
            $rules["{$p}.tipo"]           = 'required|in:Suministrador,Generador,Exenta';
            $rules["{$p}.nombre"]         = 'required|string';
            $rules["{$p}.direccion_carga"] = 'required|string';
            $rules["{$p}.direccion_fiscal"] = 'required|string';
            $rules["{$p}.entidad"]        = 'required|string';
            $rules["{$p}.municipio"]      = 'required|string';
            $rules["{$p}.latitud"]        = 'required|numeric';
            $rules["{$p}.longitud"]       = 'required|numeric';
            $rules["{$p}.rpu"]            = 'required|string';
            $rules["{$p}.nivel_tension"]  = 'required|string';
            $rules["{$p}.demanda_contratada"] = 'required|string';
            $rules["{$p}.rmu"]                 = 'nullable|string';
            $rules["{$p}.gerencia_cenace"]     = 'nullable|string';
            $rules["{$p}.division_cenace"]     = 'nullable|string';
            $rules["{$p}.zona_cenace"]         = 'nullable|string';
            $rules["{$p}.gerencia_cfe"]        = 'nullable|string';
            $rules["{$p}.division_cfe"]        = 'nullable|string';
            $rules["{$p}.zona_cfe"]            = 'nullable|string';
            $rules["{$p}.subestacion"]         = 'nullable|string';
            $rules["{$p}.punto_conexion"]      = 'nullable|string';
            $rules["{$p}.punto_interconexion"] = 'nullable|string';
            // ahora recibos como array de PDFs
            $rules["{$p}.recibos"]    = 'required|array|min:1|max:12';
            $rules["{$p}.recibos.*"]  = 'file|mimes:pdf|max:2048';
            // unifilares y kmz opcionales, c/ tope 12
            $rules["{$p}.unifilares"]    = 'nullable|array|max:12';
            $rules["{$p}.unifilares.*"]  = 'file|mimes:pdf,dwg|max:2048';
            $rules["{$p}.kmz"]           = 'nullable|array|max:12';
            $rules["{$p}.kmz.*"]         = 'file|mimes:pdf,dwg|max:2048';
            $rules["{$p}.clabe_pesos"]   = 'required|string';
            $rules["{$p}.clabe_dolares"] = 'required|string';
        }
        return $rules;
    }

    public function mount()
    {
        $this->addCentro();
    }

    public function addCentro()
    {
        $this->centros[] = [
            'tipo'                => '',
            'nombre'              => '',
            'direccion_carga'     => '',
            'direccion_fiscal'    => '',
            'entidad'             => '',
            'municipio'           => '',
            'latitud'             => '',
            'longitud'            => '',
            'rpu'                 => '',
            'nivel_tension'       => '',
            'demanda_contratada'  => '',
            'rmu'                 => '',
            'gerencia_cenace'     => '',
            'division_cenace'     => '',
            'zona_cenace'         => '',
            'gerencia_cfe'        => '',
            'division_cfe'        => '',
            'zona_cfe'            => '',
            'subestacion'         => '',
            'punto_conexion'      => '',
            'punto_interconexion' => '',
            'recibos'             => [],
            'unifilares'          => [],
            'kmz'                 => [],
            'clabe_pesos'         => '',
            'clabe_dolares'       => '',
        ];
    }

    public function removeCentro($i)
    {
        unset($this->centros[$i]);
        $this->centros = array_values($this->centros);
    }

    public function goToStep($i)
    {
        $i = (int) $i;
        if ($i < 1 || $i > $this->totalSteps) {
            return;
        }
        // Permitir sólo pasos actuales o ya completados; bloquear futuros
        if ($i <= $this->step || $i <= $this->maxCompletedStep) {
            $this->step = $i;
        }
    }

    public function nextStep()
    {
        try {
            if ($this->step === 1) {
                // Validar paso 1 con manejo de errores
                $this->validateOnly('name');
                $this->validateOnly('email');
                $this->validateOnly('password');
                
                // Validar archivos solo si están presentes
                if ($this->acta_constitutiva) $this->validateOnly('acta_constitutiva');
                if ($this->poderes) $this->validateOnly('poderes');
                if ($this->constancia_fiscal) $this->validateOnly('constancia_fiscal');
                if ($this->ine) $this->validateOnly('ine');
                if ($this->opinion_d32) $this->validateOnly('opinion_d32');

                // Validar que todos los archivos estén presentes
                if (!$this->acta_constitutiva || !$this->poderes || !$this->constancia_fiscal || 
                    !$this->ine || !$this->opinion_d32) {
                    $this->addError('documentos', 'Todos los documentos PDF son requeridos.');
                    return;
                }

                if (!in_array(1, $this->completedSteps)) {
                    $this->completedSteps[] = 1;
                    $this->maxCompletedStep = max($this->maxCompletedStep, 1);
                }

                $this->step = 2;
                return;
            }

            if ($this->step === 2) {
                // Validar paso 2 antes de finalizar
                $this->validate($this->centrosRules());
                
                // En el último paso, se guarda todo
                $this->finish();
                return;
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Los errores de validación se manejan automáticamente por Livewire
            return;
        } catch (\Exception $e) {
            // Manejar otros errores
            $this->addError('general', 'Ocurrió un error inesperado. Por favor, intente nuevamente.');
            return;
        }
    }

    public function finish()
    {
        // Validar todos los pasos antes de guardar
        $this->validate($this->step1Rules());
        $this->validate($this->centrosRules());

        DB::transaction(function () {
            // 1) Crear el usuario
            $usuario = User::create([
                'name'      => $this->name,
                'email'     => $this->email,
                'password'  => Hash::make($this->password),
                'is_client' => 1,
                'is_active' => 0,
            ]);

            // Guardamos su ID para futuras referencias
            $this->userId = $usuario->id;

            // 2) Subir los documentos generales del paso 1
            foreach (['acta_constitutiva','poderes','constancia_fiscal','ine','opinion_d32'] as $f) {
                $file = $this->{$f};
                $orig = $file->getClientOriginalName();
                $path = $file->store("clientes/{$usuario->id}/generales/{$f}", 'public');
                Documento::create([
                    'user_id'         => $usuario->id,
                    'empresa_id'      => null,
                    'categoria'       => $f,
                    'ruta'            => $path,
                    'nombre_original' => $orig,
                    'subido_en'       => now(),
                ]);
            }

            // 3) Crear empresas y subir documentos del paso 2
            foreach ($this->centros as $i => $c) {
                $emp = Empresa::create([
                    'tipo'                => $c['tipo'],
                    'nombre'              => $c['nombre'],
                    'direccion_carga'     => $c['direccion_carga'],
                    'direccion_fiscal'    => $c['direccion_fiscal'],
                    'entidad'             => $c['entidad'],
                    'municipio'           => $c['municipio'],
                    'latitud'             => $c['latitud'],
                    'longitud'            => $c['longitud'],
                    'rpu'                 => $c['rpu'],
                    'nivel_tension'       => $c['nivel_tension'],
                    'demanda_contratada'  => $c['demanda_contratada'],
                    'rmu'                 => $c['rmu'],
                    'gerencia_cenace'     => $c['gerencia_cenace'],
                    'division_cenace'     => $c['division_cenace'],
                    'zona_cenace'         => $c['zona_cenace'],
                    'gerencia_cfe'        => $c['gerencia_cfe'],
                    'division_cfe'        => $c['division_cfe'],
                    'zona_cfe'            => $c['zona_cfe'],
                    'subestacion'         => $c['subestacion'],
                    'punto_conexion'      => $c['punto_conexion'],
                    'punto_interconexion' => $c['punto_interconexion'],
                    'operando'            => 0,
                ]);

                // Relación pivote
                $usuario->empresa()->attach($emp->id);

                // Recibos
                foreach ($c['recibos'] as $k => $f) {
                    $orig = $f->getClientOriginalName();
                    $path = $f->store("clientes/{$usuario->id}/empresas/{$emp->id}/recibos", 'public');
                    Documento::create([
                        'user_id'         => $usuario->id,
                        'empresa_id'      => $emp->id,
                        'categoria'       => 'recibo_individual',
                        'ruta'            => $path,
                        'nombre_original' => $orig,
                        'subido_en'       => now(),
                    ]);
                }

                // Unifilares
                foreach ($c['unifilares'] as $k => $f) {
                    $orig = $f->getClientOriginalName();
                    $path = $f->store("clientes/{$usuario->id}/empresas/{$emp->id}/unifilares", 'public');
                    Documento::create([
                        'user_id'         => $usuario->id,
                        'empresa_id'      => $emp->id,
                        'categoria'       => "unifilar_{$k}",
                        'ruta'            => $path,
                        'nombre_original' => $orig,
                        'subido_en'       => now(),
                    ]);
                }

                // KMZ
                foreach ($c['kmz'] as $k => $f) {
                    $orig = $f->getClientOriginalName();
                    $path = $f->store("clientes/{$usuario->id}/empresas/{$emp->id}/kmz", 'public');
                    Documento::create([
                        'user_id'         => $usuario->id,
                        'empresa_id'      => $emp->id,
                        'categoria'       => "kmz_{$k}",
                        'ruta'            => $path,
                        'nombre_original' => $orig,
                        'subido_en'       => now(),
                    ]);
                }
            }
        });

        // Marcar paso 2 como completado y mostrar confirmación
        if (!in_array(2, $this->completedSteps)) {
            $this->completedSteps[] = 2;
            $this->maxCompletedStep = max($this->maxCompletedStep, 2);
        }

        $this->step = 3;
    }

    public function render()
    {
        return view('livewire.registro-cliente-wizard');
    }
}

