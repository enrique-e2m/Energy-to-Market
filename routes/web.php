<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/esg', function () {
    return view('esg');
})->name('esg');

Route::get('/usuarios-calificados', function () {
    return redirect()->away('https://e2m.mx/usuarios-calificados/');
})->name('usuarios.calificados');
Route::get('/centrales-electricas', function () {
    return redirect()->away('https://e2m.mx/centrales-electricas/');
})->name('centrales.electricas');
Route::get('/sostenibilidad-empresarial', function () {
    return redirect()->away('https://e2m.mx/sostenibilidad-empresarial/');
})->name('sostenibilidad.empresarial');
Route::get('/usuarios-calificados-con-generacion-propia', function () {
    return redirect()->away('https://e2m.mx/usuarios-calificados-con-generacion-propia/');
})->name('usuarios.calificados.generacion.propia');

Route::get('/aviso-privacidad', function () {
    return view('privacy');
})->name('privacidad');
