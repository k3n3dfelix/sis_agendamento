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

//Rotas  Usuários---------------------------------------------------------------------------------------------
Route::get('/usuario', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuario');
Route::get('/usuario/adicionar', [App\Http\Controllers\UsuarioController::class, 'adicionar'])->name('usuario.adicionar');
Route::post('/usuario/salvar', [App\Http\Controllers\UsuarioController::class, 'salvar'])->name('usuario/salvar');
Route::post('/usuario/salvar', [App\Http\Controllers\UsuarioController::class, 'salvar'])->name('usuario.salvar');
Route::get('/usuario/editar/{id_usuario}', [App\Http\Controllers\UsuarioController::class, 'editar'])->name('usuario.editar');
Route::put('/usuario/atualizar/{id}', [App\Http\Controllers\UsuarioController::class, 'atualizar'])->name('usuario.atualizar');
Route::get('/usuario/deletar/{id}', [App\Http\Controllers\UsuarioController::class, 'deletar'])->name('usuario.deletar');