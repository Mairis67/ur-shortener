<?php

use App\Http\Controllers\ShortUrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShortUrlController::class, 'index']);

Route::post('/', [ShortUrlController::class, 'store'])->name('.post');

Route::get('{code}', [ShortUrlController::class, 'shortenUrl'])->name('shorten.link');


