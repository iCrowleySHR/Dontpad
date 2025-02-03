<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/xnd-wcvw-fyd', [PageController::class, 'search'])->name('search')->middleware('verify.referer');;
Route::get('/', [HomeController::class, 'show']);
Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '.*');
Route::post('/{slug}', [PageController::class, 'update'])->where('slug', '.*');
