<?php

use App\Http\Controllers\EmailTrackerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')
    ->middleware('guest')
    ->name('welcome');

Route::view('/markdownx', 'markdownx');

collect(['service', 'iban', 'uuid', 'binary'])
    ->each(fn ($route) => Route::get($route, 'App\\Http\\Controllers\\' . ucfirst($route) . 'Controller'::class));

Route::middleware(['auth:sanctum', 'verified', 'user.is:approved'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/leads', [EmailTrackerController::class, 'index'])->name('leads');
    Route::get('/leads/mailable', [EmailTrackerController::class, 'mailable']);
});

Route::get('/leads/{email:tracking_id}', [EmailTrackerController::class, 'show'])->name('leads.show');
