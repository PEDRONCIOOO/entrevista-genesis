<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\ViagemController;

Route::resource('veiculos', VeiculoController::class);
Route::resource('motoristas', MotoristaController::class);
Route::resource('viagens', ViagemController::class)
    ->parameters(['viagens' => 'viagem']);
