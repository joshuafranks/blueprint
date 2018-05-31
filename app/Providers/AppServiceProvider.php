<?php

namespace App\Providers;

use App\Interfaces\ProjectEloquentInterface;
use App\Interfaces\FileEloquentInterface;
use App\Repositories\ProjectEloquentRepository;
use App\Repositories\FileEloquentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProjectEloquentInterface::class, ProjectEloquentRepository::class);
        $this->app->bind(FileEloquentInterface::class, FileEloquentRepository::class);
    }
}
