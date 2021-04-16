<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Organization\OrganizationController;


Route::resource('/dashboard/organization', OrganizationController::class)
    ->only('index', 'edit', 'update');

