<?php

use App\Http\Controllers\EncuestaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Ruta para el dashboard
    Route::get('/dashboard', function () {
        return view('dashboard'); // Asegúrate de que el contenido del dashboard se cargue aquí
    })->name('dashboard');

    // Rutas para las encuestas (CRUD)
    Route::resource('encuestas', EncuestaController::class);
});

