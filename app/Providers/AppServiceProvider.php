<?php

namespace App\Providers;

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
        $this->app->singleton(\App\Repositories\Prd\AttrInterface::class,\App\Repositories\Prd\AttrRepository::class);

        $this->app->singleton(\App\Repositories\Prd\PrdInterface::class,\App\Repositories\Prd\PrdRepository::class);

        $this->app->singleton(\App\Repositories\Prd\AttrGrInterface::class,\App\Repositories\Prd\AttrGrRepository::class);

        $this->app->singleton(\App\Repositories\Prd\AttrGrMapInterface::class,\App\Repositories\Prd\AttrGrMapRepository::class);

        $this->app->singleton(\App\Repositories\Prd\CatInterface::class,\App\Repositories\Prd\CatRepository::class);

        $this->app->singleton(\App\Repositories\Prd\BrandInterface::class,\App\Repositories\Prd\BrandRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('cart', \Session::get('cart'));
    }
}
