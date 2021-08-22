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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rotas Login Personalizado---------------------------------------------------------------------------------------
Route::get('/paineladm', [App\Http\Controllers\AutenticacaoController::class, 'index'])->name('paineladm');
Route::get('/admin', [App\Http\Controllers\AutenticacaoController::class, 'index'])->name('admin');
Route::get('/login', [App\Http\Controllers\AutenticacaoController::class, 'login'])->name('login');
Route::post('/logindo', [App\Http\Controllers\AutenticacaoController::class, 'logindo'])->name('logindo');
Route::post('/logout', [App\Http\Controllers\AutenticacaoController::class, 'logout'])->name('logout');

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

//Rotas Aulas---------------------------------------------------------------------------------------------
Route::get('/aula', [App\Http\Controllers\AulaController::class, 'index'])->name('aula');
Route::get('/aula/professor', [App\Http\Controllers\AulaController::class, 'professor'])->name('professor');
Route::get('/aula/adicionar', [App\Http\Controllers\AulaController::class, 'adicionar'])->name('aula.adicionar');
Route::post('/aula/salvar', [App\Http\Controllers\AulaController::class, 'salvar'])->name('aula/salvar');
Route::post('/aula/salvar', [App\Http\Controllers\AulaController::class, 'salvar'])->name('aula.salvar');
Route::get('/aula/editar/{id}', [App\Http\Controllers\AulaController::class, 'editar'])->name('aula.editar');
Route::put('/aula/atualizar/{id}', [App\Http\Controllers\AulaController::class, 'atualizar'])->name('aula.atualizar');
Route::get('/aula/deletar/{id}', [App\Http\Controllers\AulaController::class, 'deletar'])->name('aula.deletar');

//Rotas Agendas---------------------------------------------------------------------------------------------
Route::get('/agenda', [App\Http\Controllers\AgendaController::class, 'index'])->name('agenda');
Route::get('/agenda/confirmar/{id}', [App\Http\Controllers\AgendaController::class, 'confirmar'])->name('agenda.confirmar');
Route::get('/agenda/adicionar', [App\Http\Controllers\AgendaController::class, 'adicionar'])->name('agenda.adicionar');
Route::get('/agenda/agendar/{id}', [App\Http\Controllers\AgendaController::class, 'agendar'])->name('agenda.agendar');
Route::get('/agenda/agendarconf', [App\Http\Controllers\AgendaController::class, 'agendarconf'])->name('agendarconf.agendarconf');
Route::post('/agenda/salvar', [App\Http\Controllers\AgendaController::class, 'salvar'])->name('agenda/salvar');
Route::post('/agenda/salvar', [App\Http\Controllers\AgendaController::class, 'salvar'])->name('agenda.salvar');
Route::get('/agenda/editar/{id}', [App\Http\Controllers\AgendaController::class, 'editar'])->name('agenda.editar');
Route::put('/agenda/atualizar/{id}', [App\Http\Controllers\AgendaController::class, 'atualizar'])->name('agenda.atualizar');
Route::get('/agenda/deletar/{id}', [App\Http\Controllers\AgendaController::class, 'deletar'])->name('agenda.deletar');


Route::get('/notification', [App\Http\Controllers\NotificationController::class, 'notification'])->name('notification');