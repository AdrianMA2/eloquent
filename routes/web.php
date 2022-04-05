<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GraficoController;
use App\Http\Controllers\Grafico2Controller;
use App\Http\Controllers\Grafico3Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUpload;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('obtenerfilm', 'App\Http\Controllers\FilmController@buscarfilm')
         ->name('peliculas.buscarfilm');
Route::resource('peliculas', FilmController::class);

Route::resource('graficos', GraficoController::class);
Route::resource('graficos2', Grafico2Controller::class);
Route::resource('graficos3', Grafico3Controller::class);


Route::get('/downloadFile', [FileUpload::class, 'downloadFile']);
Route::get('/upload-file', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');