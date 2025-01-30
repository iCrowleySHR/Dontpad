<?php

use App\Models\Pages;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('page-updated.{slug}', function ($user, $slug) {
    return Pages::where('slug', $slug)->exists();
});