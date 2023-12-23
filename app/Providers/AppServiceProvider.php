<?php

namespace App\Providers;

use App\Repositories\SupportEloquentORM;
use App\Repositories\SupportRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // dizendo assim: onde tem a classe de interface,
        // interprete como essa classe concreta aqui (que tem os metodos)
        $this->app->bind(SupportRepositoryInterface::class, SupportEloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
