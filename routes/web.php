<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\DashboardController;

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

Route::get('/register',[UserController::class,'addUser']) ->name('users.add');

Route::post('/create-user',[UserController::class,'createUser']) ->name('user.create');

Route::get('/dashboard-home',[DashboardController::class,'index']) ->name('home_dashboard') ->middleware('auth');

Route::fallback(function () {

return '<h1>Estás todo/a perdido/a. Clica aqui para voltares ao meu site lindo</h1>';
});
