<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rotas Tipo Usuários---------------------------------------------------------------------------------------------
Route::get('/tipo', [App\Http\Controllers\TipoController::class, 'index'])->name('tipo');
Route::get('/tipo/adicionar', [App\Http\Controllers\TipoController::class, 'adicionar'])->name('tipo.adicionar');
Route::post('/tipo/salvar', [App\Http\Controllers\TipoController::class, 'salvar'])->name('tipo/salvar');
Route::post('/tipo/salvar', [App\Http\Controllers\TipoController::class, 'salvar'])->name('tipo.salvar');
Route::get('/tipo/editar/{id}', [App\Http\Controllers\TipoController::class, 'editar'])->name('tipo.editar');
Route::put('/tipo/atualizar/{id}', [App\Http\Controllers\TipoController::class, 'atualizar'])->name('tipo.atualizar');
Route::get('/tipo/deletar/{id}', [App\Http\Controllers\TipoController::class, 'deletar'])->name('tipo.deletar');