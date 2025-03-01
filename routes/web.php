<?php

use App\Http\Middleware\IsAdmin;
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

// Rotas que precisam de login para poder aceder
Route::middleware(['auth'])->group(function (){

    //Rotas exclusivas para admins
    Route::middleware([IsAdmin::class])->group(function(){
        Route::post('/create-band', [BandController::class, 'createBand'])->name('bands.create');

Route::get('/add-band', [BandController::class, 'addBand'])->name('bands.add');

Route::get('/delete-band/{id}', [BandController::class, 'deleteBands'])->name('bands.delete');
Route::get('/add-album', [AlbumController::class, 'addAlbum'])->name('albums.add');

Route::post('/create-album', [AlbumController::class, 'createAlbum'])->name('albums.create');

Route::get('/delete-album/{id}', [AlbumController::class, 'deleteAlbums'])->name('albums.delete');

    });

Route::get('/edit-band/{id}', [BandController::class, 'editBand'])->name('bands.edit');

Route::post('/update-band/{id}', [BandController::class, 'updateBand'])->name('bands.update');

Route::get('/edit-album/{id}', [AlbumController::class, 'editAlbum'])->name('albums.edit');

Route::post('/update-album/{id}', [AlbumController::class, 'updateAlbum'])->name('albums.update');
});

Route::get('/albums/{id}', [AlbumController::class, 'viewAlbums'])->name('albums.view');

Route::get('/register',[UserController::class,'addUser']) ->name('users.add');

Route::post('/create-user',[UserController::class,'createUser']) ->name('user.create');

Route::get('/dashboard-home',[DashboardController::class,'index']) ->name('home_dashboard') ->middleware('auth');

Route::fallback(function () {return view ('fallback') ;});
