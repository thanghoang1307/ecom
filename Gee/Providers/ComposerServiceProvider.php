<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.front','components.cat'],\App\ViewComposers\CatComposer::class);
        View::composer('front.index',\App\ViewComposers\SettingComposer::class);
        View::composer('components.recently_view',\App\ViewComposers\RecentlyViewedProductsViewComposer::class);
        View::composer(['includes.post','front.post-list','front.post-detail'],\App\ViewComposers\PostComposer::class);
        View::composer(['components.new'],\App\ViewComposers\NewPrdComposer::class);
        View::composer(['includes.cart_detail'],\App\ViewComposers\CartComposer::class);
    }
}
