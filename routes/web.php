<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdvertController;

Route::get('/adverts', [AdvertController::class, 'index'])->name('adverts.overview');

Route::redirect('/', 'adverts');