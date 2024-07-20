<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuarioController;

Route::post('/usuario', [usuarioController::class, 'Crear']);
Route::delete('/usuario/{d}', [usuarioController::class, 'Eliminar']);
Route::put('/usuario/{d}', [usuarioController::class, 'Modificar']);
Route::get('/usuario', [usuarioController::class, 'ListarTodos']);
Route::get('/usuario/{d}', [usuarioController::class, 'BuscarUnId']);
