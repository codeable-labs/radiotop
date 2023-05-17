<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Frontend\HomeController as Home;
use App\Http\Controllers\Backend\ArtistController;
use App\Http\Controllers\Backend\GenderController;
use App\Http\Controllers\Backend\PublicityController;
use App\Http\Controllers\Backend\RankingController;
use App\Http\Controllers\Backend\RegionController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\MetodologiaController;
use App\Http\Controllers\Backend\BloqueController;

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

Route::get('/', [Home::Class,'index']);
Route::get('/radio-top-tv', [Home::Class,'radioTop']);
Route::get('/sobre-nosotros', [Home::Class,'metodologia']);
Route::get('/radar-top', [Home::Class,'notasPrensa']);
Route::get('/nuestros-servicios', [Home::Class,'anunciaNosotros'])->name('home.anuncia');
Route::get('/rankings', [Home::Class,'ranking']);
Route::get('/rankings/{genero}/{region}/{artista}',[Home::class,'detalle']);

Route::post('/contacto', [Home::Class,'contacto'])->name('home.contacto');

Route::post('/get-result',[Home::class,'getResult']);

Route::get('/get-publicidad/{pos}',[Home::class,'getPublicidad']);
Route::post('/set-data',[Home::class,'setImpresion']);

Auth::routes();

Route::prefix('admin')->group(function(){
    Route::get('/',[HomeController::class,'index']);
    Route::resource('artistas',ArtistController::class)->except([
        'show'
    ]);
    Route::resource('regiones',RegionController::class)->except([
        'show'
    ]);
    Route::resource('generos',GenderController::class)->except([
        'show'
    ]);
    Route::resource('publicidad',PublicityController::class)->except([
        'show'
    ]);
    Route::resource('ranking',RankingController::class)->except([
        'show'
    ]);
    Route::resource('notas',PostController::class)->except([
        'show'
    ]);
    Route::resource('banners',BannerController::class)->except([
        'show'
    ]);
    Route::resource('bloques',BloqueController::class)->except([
        'show'
    ]);
    Route::resource('metodologias',MetodologiaController::class)->except([
        'show'
    ]);
    Route::get('/contactos',[ContactController::class,'index']);
   
});