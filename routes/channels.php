<?php

use App\Models\Pages;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('page-updated.{slug}', function ($user, $slug) {
    return Pages::where('slug', $slug)->exists();
});