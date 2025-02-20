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



Route::fallback(function () {
    return '<h1>Estás todo(a) perdido(a). Clica aqui rápidoooo</h1>';
});
