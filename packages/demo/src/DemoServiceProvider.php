<?php

declare(strict_types=1);

namespace Thinkverse;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class DemoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../routes/web.php');
    }
}
