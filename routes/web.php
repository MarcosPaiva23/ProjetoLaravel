<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;

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

// Rotas de registo
Route::get('/register', [UserController::class, 'registerForm'])->name('users.add');
Route::post('/register-user', [UserController::class, 'insertUserIntoDB'])->name('users.register');

// Rotas de login
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('users.login');

// Rotas de logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::fallback(function () {


    return '<h1>Estás todo/a perdido/a. Clica aqui para voltares ao meu site lindo</h1>';
});
