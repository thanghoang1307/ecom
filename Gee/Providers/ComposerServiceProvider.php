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
        View::composer(['layouts.front','components.cat','layouts.check-out'],\App\ViewComposers\CatComposer::class);
        View::composer(['front.check-out-1','front.add_address','front.edit_address'],\App\ViewComposers\LocationComposer::class);
        View::composer('*',\App\ViewComposers\SettingComposer::class);
        View::composer('components.recently_view',\App\ViewComposers\RecentlyViewedProductsViewComposer::class);
        View::composer(['includes.post','front.post-list','front.post-detail'],\App\ViewComposers\PostComposer::class);
        View::composer(['components.new'],\App\ViewComposers\NewPrdComposer::class);
        View::composer(['includes.cart_detail'],\App\ViewComposers\CartComposer::class);
    }
}
