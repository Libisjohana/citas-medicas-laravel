<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\EpsController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('can:home')->name('home');


Route::resource('usuarios', UserController::class)->except('show')->names('admin.users');
Route::resource('eps', EpsController::class)->except('show')->names('admin.eps');
Route::resource('medicos', MedicoController::class)->except('show')->names('admin.medicos');
Route::resource('especialidades', EspecialidadController::class)->except('show')->names('admin.especialidades');
Route::resource('citas', CitaController::class)->except('show')->names('admin.citas');
Route::resource('pacientes', PacienteController::class)->except('show')->names('admin.pacientes');
