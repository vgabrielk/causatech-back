<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\AdvogadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProcessoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\HistoricoAndamentoController;
use App\Http\Controllers\ParteEnvolvidaController;
use App\Http\Controllers\AudienciaController;
use App\Http\Controllers\AlertaController;
use App\Http\Controllers\TaskController;

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/users', [UserController::class, 'index'])->middleware('role:admin');
    Route::get('/user', [UserController::class, 'show']);
    Route::apiResource('/contracts', ContractController::class);
    Route::apiResource('/advogados', AdvogadoController::class);
    Route::apiResource('/processos', ProcessoController::class);
    Route::apiResource('/documentos', DocumentoController::class);
    Route::apiResource('/historicoandamentos', HistoricoAndamentoController::class);
    Route::apiResource('/partesenvolvidas', ParteEnvolvidaController::class);
    Route::apiResource('/audiencias', AudienciaController::class);
    Route::apiResource('/alertas', AlertaController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/clientes', ClienteController::class);
});
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
