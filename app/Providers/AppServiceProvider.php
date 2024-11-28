<?php

namespace App\Providers;
use App\Models\Setting;
use App\Models\Store;
use App\Models\Client;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

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
        $settings = Setting::first();
        $stores=Store::all();
        $clients=Client::all();
        $products=Product::all();
        $orders=Order::all();
        View::share('settings', $settings);
        View::share('stores', $stores);
        View::share('clients', $clients);
        View::share('products', $products);
        View::share('orders', $orders);

        View::share('totalStores', $stores->count());
        View::share('totalClients', $clients->count());
        View::share('totalProducts', $products->count());
        View::share('totalOrders', $orders->count());


    }
}
