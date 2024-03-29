<?php

namespace App\Providers;

use App\Models\Support;
use App\Observers\SupportObserver;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use App\Repositories\Eloquent\ReplySupportRepository;
use App\Repositories\SupportEloquentORM;
use App\Repositories\Contracts\SupportRepositoryInterface;
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
        $this->app->bind(ReplyRepositoryInterface::class, ReplySupportRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Support::observe(SupportObserver::class);
    }
}
