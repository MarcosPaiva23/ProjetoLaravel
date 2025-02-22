<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class, 'index'])->name('home');

Route::get('/bands',[BandController::class, 'bands'])->name('bands.show');

Route::post('/create-band', [BandController::class, 'createBand'])->name('bands.create');

Route::get('/add-band', [BandController::class, 'addBand'])->name('bands.add');

Route::get('/album/{id}', [AlbumController::class, 'viewAlbum'])->name('albums.view');

Route::get('/add-album', [AlbumController::class, 'addAlbum'])->name('albums.add');

Route::post('/create-album', [AlbumController::class, 'createAlbum'])->name('albums.create');



Route::fallback(function () {
    return '<h1>Estás todo(a) perdido(a). Clica aqui rápidoooo</h1>';
});
