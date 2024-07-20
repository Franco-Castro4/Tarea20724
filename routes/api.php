<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuarioController;

Route::post('/usuario', [usuarioController::class, 'Crear']);
