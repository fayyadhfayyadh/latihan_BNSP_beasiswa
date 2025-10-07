<?php

use App\Http\Controllers\beasiswaController;
use App\Http\Controllers\jenisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('jenis', JenisController::class);
Route::resource('beasiswa', beasiswaController::class);

