<?php

use App\Http\Controllers\DatosMaestrosController;
use App\Http\Controllers\EspecificacionesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduccionController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

#datos maestros

Route::get('/datosMaestros', [DatosMaestrosController::class, 'index'])->name('datosMaestros.index');
Route::get('/datosMaestros/create', [DatosMaestrosController::class, 'create'])->name('datosMaestros.create');
Route::get('/datosMaestros/show/{id}', [DatosMaestrosController::class, 'show'])->name('datosMaestros.show');
Route::get('/datosMaestros/edit/{id}', [DatosMaestrosController::class, 'edit'])->name('datosMaestros.edit');
Route::get('/datosMaestros/validar/codigo/{codigo}' , [DatosMaestrosController::class, 'validarCodigo']);
Route::post('/datosMaestros/store', [DatosMaestrosController::class, 'store'])->name('datosMaestros.store');
Route::get('/datosMaestros/especificaciones/{codigo}', [DatosMaestrosController::class, 'index'])->name('datosMaestros.especificaciones');


#datos maestros

Route::get('/especificaciones/edit/{idCodigo}', [EspecificacionesController::class, 'edit'])->name('especificaciones.edit');


Route::get('/produccion/index', [ProduccionController::class, 'index'])->name('produccion.index');
Route::get('/produccion/create/{codigo}', [ProduccionController::class, 'create'])->name('produccion.create');
Route::post('/produccion/store', [ProduccionController::class, 'store'])->name('produccion.store');
Route::get('/produccion/PDF_OP/{id}', [ProduccionController::class, 'pdfOP'])->name('produccion.pdfOP');

Route::get('posts',[PostController::class, 'index'])->name('posts.index');
Route::get('posts/search',[PostController::class, 'search'])->name('posts.search');
Route::get('posts/show',[PostController::class, 'show'])->name('posts.show');
