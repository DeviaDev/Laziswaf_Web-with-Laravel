<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SitiAminahUp;
use App\Observers\SitiAminahUpObserver;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        SitiAminahUp::observe(SitiAminahUpObserver::class);
    }
}