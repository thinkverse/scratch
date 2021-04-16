<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Organization\OrganizationController;


Route::resource('/dashboard/organization', OrganizationController::class)
    ->middleware(['auth:sanctum', 'verified'])
    ->only('index', 'edit', 'update');

