<?php

namespace App\Providers;

use App\Domains\Core\Contracts\JobRepository;
use App\Domains\Core\Infra\Eloquent\JobRepository as EloquentJobRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(JobRepository::class, EloquentJobRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
