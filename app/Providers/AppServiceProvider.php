<?php

namespace App\Providers;
use App\Http\Controllers\BannerController;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        Paginator::useBootstrap();
         view()->composer('*', function ($view){
             $view ->with([
                 'admin'=>User::all(),
                 'categories'=>Category::all(),
                 'products'=>Product::all(),
                 'types'=>Type::all(),
                 'banners'=>Banner::all()
             ]);
         });
    }
}
