<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E2M | Sostenibilidad Empresarial (ESG)</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @livewireStyles
    @stack('styles')
    <style>
        :root {
            --accent-orange: #f99c26e6;
            --accent-green: #79b464e6;
        }

        .liquidGlass-wrapper {
            position: relative;
            display: flex;
            overflow: hidden;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, .12);
            background: rgba(255, 255, 255, .55);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, .45);
        }

        .liquidGlass-effect,
        .liquidGlass-tint,
        .liquidGlass-shine {
            position: absolute;
            inset: 0;
            pointer-events: none;
            border-radius: inherit
        }

        .liquidGlass-effect {
            backdrop-filter: blur(3px)
        }

        .liquidGlass-tint {
            background: rgba(255, 255, 255, .1)
        }

        .liquidGlass-text {
            position: relative;
            z-index: 10;
            width: 100%
        }

        .section-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem
        }

        .btn-orange {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            background: var(--accent-orange);
            color: #fff;
            padding: .7rem 1rem;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none
        }

        .btn-orange:hover {
            background: var(--accent-green)
        }

        .soft-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: rgba(59, 130, 246, .12);
            color: #3b82f6
        }
    </style>
</head>

<body class="font-inter bg-[#0b1220] text-slate-900">
    @livewire('site-navbar')


    <main class="pt-24 relative">
        <section class="relative overflow-hidden">
            <video class="absolute inset-0 w-full h-full object-cover z-0 pointer-events-none" src="{{ asset('images/blog.mp4') }}" autoplay muted loop playsinline></video>
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/30"></div>
            <div class="section-container relative z-10">
                <div class="grid md:grid-cols-2 gap-8 items-center py-16">
                    <div class="liquidGlass-wrapper">
                        <div class="liquidGlass-effect"></div>
                        <div class="liquidGlass-tint"></div>
                        <div class="liquidGlass-text p-8 text-white">
                            <h1 class="text-3xl md:text-4xl font-bold">Sostenibilidad Empresarial</h1>
                            <p class="mt-5 text-white/85">Con el fin de cumplir tu cuota de consumo de energía limpia, E2M incorpora en tu empresa la energía renovable y los Certificados de Energía Limpia (CELs) para así lograr tus objetivos de sostenibilidad.</p>
                            <a href="#gestion" class="btn-orange mt-6">Ver más <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div class="liquidGlass-wrapper">
                            <div class="liquidGlass-effect"></div>
                            <div class="liquidGlass-tint"></div>
                            <div class="liquidGlass-text p-6 text-white">
                                <div class="text-3xl font-bold">+20</div>
                                <div class="text-sm text-white/80">Años de experiencia en el mercado eléctrico</div>
                            </div>
                        </div>
                        <div class="liquidGlass-wrapper">
                            <div class="liquidGlass-effect"></div>
                            <div class="liquidGlass-tint"></div>
                            <div class="liquidGlass-text p-6 text-white">
                                <div class="text-3xl font-bold">+500 GWh</div>
                                <div class="text-sm text-white/80">Energía suministrada anualmente</div>
                            </div>
                        </div>
                        <div class="liquidGlass-wrapper">
                            <div class="liquidGlass-effect"></div>
                            <div class="liquidGlass-tint"></div>
                            <div class="liquidGlass-text p-6 text-white">
                                <div class="flex items-center gap-3">
                                    <div class="soft-icon"><i class="fa-solid fa-mobile-screen"></i></div>
                                    <div class="font-semibold">Mem on Cloud</div>
                                </div>
                                <div class="mt-2 text-sm text-white/80">App de reportes de PML al instante</div>
                            </div>
                        </div>
                        <div class="liquidGlass-wrapper">
                            <div class="liquidGlass-effect"></div>
                            <div class="liquidGlass-tint"></div>
                            <div class="liquidGlass-text p-6 text-white">
                                <div class="flex items-center gap-3">
                                    <div class="soft-icon"><i class="fa-solid fa-chart-line"></i></div>
                                    <div class="font-semibold">Reportes</div>
                                </div>
                                <div class="mt-2 text-sm text-white/80">Comportamientos, oportunidades y riesgos</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="gestion" class="py-16">
            <div class="section-container">
                <div class="grid lg:grid-cols-2 gap-8">
                    <div class="liquidGlass-wrapper">
                        <div class="liquidGlass-effect"></div>
                        <div class="liquidGlass-tint"></div>
                        <div class="liquidGlass-text p-8">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="soft-icon"><i class="fa-solid fa-seedling"></i></div>
                                <div class="font-semibold">Energy Management</div>
                            </div>
                            <p class="text-slate-700">Los certificados de energía limpia son instrumentos financieros a través de los cuales se incentiva la producción de energía renovable, acreditando el origen de la misma. Lo que permite como beneficio agregado mejorar la competencia entre generadores de energía limpia y energía convencional.</p>
                            <h3 class="mt-5 text-xl font-bold">Certificados de Energía Limpia</h3>
                            <div class="mt-3 text-sm text-slate-700">CEL</div>
                            <p class="mt-3 text-slate-700">En el acuerdo de París celebrado en 2015, México se comprometió a que para 2024, el 35% de la energía generada y consumida en el país será limpia. Con el objetivo de medir el cumplimiento de dicha medida es que fueron creados los Certificados de Energía Limpia, que como su nombre lo indica acredita que un porcentaje de la energía consumida provenga de una fuente renovable.</p>
                            <p class="mt-3 text-slate-700">En caso de incumplir con dicho requerimiento, la Comisión Reguladora de la Energía (CRE) tiene la facultad de multar al usuario, ya que el adquirir estos certificados es indispensable para la operación en el MEM.</p>
                            <p class="mt-3 text-slate-700">El porcentaje obligatorio de compra de CELs para el 2022 es del 13.9% del consumo del usuario.</p>
                            <p class="mt-3 text-slate-700">En E2M ofrecemos CELs a los Suministradores y Usuarios que estén interesados en cumplir con este requerimiento.</p>
                        </div>
                    </div>
                    <div class="liquidGlass-wrapper">
                        <div class="liquidGlass-effect"></div>
                        <div class="liquidGlass-tint"></div>
                        <div class="liquidGlass-text p-8">
                            <h3 class="text-xl font-bold">IREC</h3>
                            <p class="mt-3 text-slate-700">En los últimos años la sostenibilidad empezó a ganar protagonismo dentro de los objetivos empresariales y también comenzó a ser demandada por consumidores y proveedores. A raíz de este escenario es que surgen alternativas como los IRECs.</p>
                            <p class="mt-3 text-slate-700">El Estándar Internacional REC (International REC Standard) funciona desde el 2014 proveyendo a gobiernos nacionales un sistema de seguimiento de atributos renovables a través de sus certificados.</p>
                            <p class="mt-3 text-slate-700">Cada i-REC garantiza que 1 MWh de energía se ha generado a partir de fuentes renovables, como un parque solar o eólico.</p>
                            <ul class="mt-4 space-y-2 text-slate-700">
                                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-600"></i>Son de carácter voluntario y funcionan en paralelo a los CELs</li>
                                <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-600"></i>Pueden ser utilizados por todas las empresas con objetivos de sostenibilidad</li>
                            </ul>
                            <a href="#contacto" class="btn-orange mt-6">Solicitar info <i class="fa-solid fa-paper-plane"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contacto" class="py-12">
            <div class="section-container">
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="liquidGlass-wrapper">
                        <div class="liquidGlass-effect"></div>
                        <div class="liquidGlass-tint"></div>
                        <div class="liquidGlass-text p-6">
                            <div class="flex items-center gap-3">
                                <div class="soft-icon"><i class="fa-solid fa-phone"></i></div>
                                <div>
                                    <div class="text-sm text-slate-600">Teléfono</div>
                                    <div class="font-semibold">+52 (55) 91317151</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="liquidGlass-wrapper">
                        <div class="liquidGlass-effect"></div>
                        <div class="liquidGlass-tint"></div>
                        <div class="liquidGlass-text p-6">
                            <div class="flex items-center gap-3">
                                <div class="soft-icon"><i class="fa-solid fa-location-dot"></i></div>
                                <div>
                                    <div class="text-sm text-slate-600">Dirección</div>
                                    <div class="font-semibold">Guillermo González Camarena 1600, Oficina 4-B, Santa Fe, Álvaro Obregón, CP 01210, Ciudad de México</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="liquidGlass-wrapper">
                        <div class="liquidGlass-effect"></div>
                        <div class="liquidGlass-tint"></div>
                        <div class="liquidGlass-text p-6">
                            <div class="flex items-center gap-3">
                                <div class="soft-icon"><i class="fa-solid fa-envelope"></i></div>
                                <div>
                                    <div class="text-sm text-slate-600">Correo</div>
                                    <div class="font-semibold">info@e2m.mx</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <livewire:site-footer />
    @stack('scripts')
    @livewireScripts
</body>

</html>