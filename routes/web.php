<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '.*');
Route::post('/{slug}', [PageController::class, 'update'])->where('slug', '.*');;;