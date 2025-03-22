<?php

use App\Models\Pages;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('page-updated.{slug}', function () {
    return true;
});