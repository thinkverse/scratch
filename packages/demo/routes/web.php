<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/lpd/demo', function () {
    return "This route is loaded via a package.";
});
