<?php

use App\Http\Controllers\GestaoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('store',[GestaoController::class,'store']);
Route::post('nome',[GestaoController::class, 'pesquisarPorNome']);
Route::get('find/{id}',[GestaoController::class, 'pesquisarPorId']);
Route::delete('delete/{id}',[GestaoController::class, 'excluir']);
Route::put('update', [GestaoController::class, 'update']);
