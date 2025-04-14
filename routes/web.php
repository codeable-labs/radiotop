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
Route::get('/radar-radiotop', [Home::Class,'notasPrensa']);
Route::get('/nuestros-servicios', [Home::Class,'anunciaNosotros'])->name('home.anuncia');
Route::get('/rankings', [Home::Class,'ranking']);
Route::get('/rankings/{genero}/{region}/{artista}',[Home::class,'detalle']);

Route::get('/ranking-table', function () {
    $ranking = (object) [
        'genero' => 'Pop',
        'music_list' => [
            (object) ['position' => 1, 'cancion' => 'Blinding Lights', 'artista' => 'The Weeknd', 'impacto' => 1050, 'tocadas' => 1200],
            (object) ['position' => 2, 'cancion' => 'Shape of You', 'artista' => 'Ed Sheeran', 'impacto' => 1020, 'tocadas' => 1150],
            (object) ['position' => 3, 'cancion' => 'Levitating', 'artista' => 'Dua Lipa', 'impacto' => 1010, 'tocadas' => 1100],
            (object) ['position' => 4, 'cancion' => 'Peaches', 'artista' => 'Justin Bieber', 'impacto' => 870, 'tocadas' => 1080],
            (object) ['position' => 5, 'cancion' => 'Good 4 U', 'artista' => 'Olivia Rodrigo', 'impacto' => 860, 'tocadas' => 1050],
            (object) ['position' => 6, 'cancion' => 'Stay', 'artista' => 'The Kid LAROI & Justin Bieber', 'impacto' => 850, 'tocadas' => 1020],
            (object) ['position' => 7, 'cancion' => 'Montero (Call Me By Your Name)', 'artista' => 'Lil Nas X', 'impacto' => 840, 'tocadas' => 1000],
            (object) ['position' => 8, 'cancion' => 'Save Your Tears', 'artista' => 'The Weeknd', 'impacto' => 830, 'tocadas' => 980],
            (object) ['position' => 9, 'cancion' => 'Drivers License', 'artista' => 'Olivia Rodrigo', 'impacto' => 820, 'tocadas' => 960],
            (object) ['position' => 10, 'cancion' => 'Bad Habits', 'artista' => 'Ed Sheeran', 'impacto' => 810, 'tocadas' => 940],
            (object) ['position' => 11, 'cancion' => 'Industry Baby', 'artista' => 'Lil Nas X & Jack Harlow', 'impacto' => 800, 'tocadas' => 920],
            (object) ['position' => 12, 'cancion' => 'Kiss Me More', 'artista' => 'Doja Cat ft. SZA', 'impacto' => 790, 'tocadas' => 900],
            (object) ['position' => 13, 'cancion' => 'Heat Waves', 'artista' => 'Glass Animals', 'impacto' => 780, 'tocadas' => 880],
            (object) ['position' => 14, 'cancion' => 'Easy On Me', 'artista' => 'Adele', 'impacto' => 770, 'tocadas' => 860],
            (object) ['position' => 15, 'cancion' => 'Shivers', 'artista' => 'Ed Sheeran', 'impacto' => 760, 'tocadas' => 840],
            (object) ['position' => 16, 'cancion' => 'Happier Than Ever', 'artista' => 'Billie Eilish', 'impacto' => 750, 'tocadas' => 820],
            (object) ['position' => 17, 'cancion' => 'Butter', 'artista' => 'BTS', 'impacto' => 740, 'tocadas' => 800],
            (object) ['position' => 18, 'cancion' => 'Permission to Dance', 'artista' => 'BTS', 'impacto' => 730, 'tocadas' => 780],
            (object) ['position' => 19, 'cancion' => 'Cold Heart', 'artista' => 'Elton John & Dua Lipa', 'impacto' => 720, 'tocadas' => 760],
            (object) ['position' => 20, 'cancion' => 'My Universe', 'artista' => 'Coldplay & BTS', 'impacto' => 710, 'tocadas' => 740],
        ],
    ];

    return view('frontend.ranking_table', compact('ranking'));
});

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