<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
        
        $this->app->singleton(\App\Repositories\Prd\PrdImageInterface::class,\App\Repositories\Prd\PrdImageRepository::class);

        $this->app->singleton(\App\Repositories\Admin\BannerInterface::class,\App\Repositories\Admin\BannerRepository::class);

        $this->app->singleton(\App\Repositories\Admin\SettingInterface::class,\App\Repositories\Admin\SettingRepository::class);

        $this->app->singleton(\App\Repositories\Admin\PostInterface::class,\App\Repositories\Admin\PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::include('includes.post','post');
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}
