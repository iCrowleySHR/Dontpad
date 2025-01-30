<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/{slug}', [PageController::class, 'show']);
Route::post('/{slug}', [PageController::class, 'update']);