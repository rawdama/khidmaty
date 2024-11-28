<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController; 
use App\Http\Controllers\Api\StoreVendorController; 
use App\Http\Controllers\Api\ProductVendorController; 
use App\Http\Controllers\Api\ClientController; 
use App\Http\Controllers\Api\CartController; 
use App\Http\Controllers\Api\FavoritesController; 
use App\Http\Controllers\Api\RatingsController; 
use App\Http\Controllers\Api\StoreController; 
use App\Http\Controllers\Api\OrderController; 
use App\Http\Controllers\Api\filterController; 
use App\Http\Controllers\Api\WalletController; 
use App\Http\Controllers\Api\SettingController; 
use App\Http\Controllers\Api\RatingStoreController;
use App\Http\Middleware\setLocale;

Route::middleware([setLocale::class])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
    Route::group(['prefix'=>'client'],function(){
        Route::post('/register',[ClientController::class,'register']);//done
        Route::post('/login',[ClientController::class,'login']);//done
        Route::post('/logout',[ClientController::class,'logout'])->middleware('auth:client');//done
        Route::put('/updateClient',[ClientController::class,'updateClient'])->middleware('auth:client');//done

        Route::apiResource('categories', CategoryController::class)->middleware('auth:client');//done
        Route::get('/categories/{categoryId}/products', [CategoryController::class, 'getProductsByCategory'])->middleware('auth:client');//done
        Route::get('/allProducts', [CategoryController::class, 'allProducts'])->middleware('auth:client');//done

        Route::post('/favorites/products', [FavoritesController::class,'addProductFavorite'])->middleware('auth:client');//done
        Route::delete('/favorites/products/{id}', [FavoritesController::class,'removeProductFavorite'])->middleware('auth:client');//done
        Route::get('/favorites/products', [FavoritesController::class, 'viewProductFavorites'])->middleware('auth:client');//done
    
        Route::post('/favorites/stores', [FavoritesController::class,'addStoreFavorite'])->middleware('auth:client');//done
        Route::delete('/favorites/stores/{id}', [FavoritesController::class,'removeStoreFavorite'])->middleware('auth:client');//done
        Route::get('/favorites/stores', [FavoritesController::class,'viewStoreFavorites'])->middleware('auth:client');//done

        Route::post('/cart', [CartController::class, 'addToCart'])->middleware('auth:client');//dona
        Route::get('/cart', [CartController::class, 'viewCart'])->middleware('auth:client');//done
        Route::delete('/cart/{id}', [CartController::class,'removeFromCart'])->middleware('auth:client');//--

        Route::get('filter/{brandId}/brands', [filterController::class,'filterBybrand'])->middleware('auth:client');//done
        Route::get('filter/{carId}/cars', [filterController::class,'filterBycar'])->middleware('auth:client');//done
        Route::post('filter/models', [filterController::class,'filterBymodel'])->middleware('auth:client');//done

        Route::post('/ratings', [RatingsController::class, 'rateProduct'])->middleware('auth:client');//done
        Route::get('/ratings/products/{productId}', [RatingsController::class, 'viewProductRatings'])->middleware('auth:client');//done
        Route::delete('/ratings/{id}', [RatingsController::class, 'removeRating'])->middleware('auth:client');//done

        Route::apiResource('/orders', OrderController::class)->middleware('auth:client');//done
        Route::get('/CurrentOrdersForClient', [OrderController::class, 'getCurrentOrdersForClient'])->middleware('auth:client');//done
        Route::get('/PreviousOrdersForClient', [OrderController::class, 'getPreviousOrdersForClient'])->middleware('auth:client');//done

        Route::get('/termsPolicies', [SettingController::class, 'termsPolicies'])->middleware('auth:client');//done
        Route::get('/privacyPolicy', [SettingController::class, 'privacyPolicy'])->middleware('auth:client');//done

        Route::apiResource('/RatingStore', RatingStoreController::class)->middleware('auth:client');//done





    });
    Route::group(['prefix'=>'store'],function(){
        Route::post('/register-s', [StoreController::class, 'register']);//done
        Route::post('/login-s', [StoreController::class, 'login']);//done
        Route::post('/logout-s', [StoreController::class, 'logout'])->middleware('auth:store');//done
        Route::apiResource('products', ProductVendorController::class)->middleware('auth:store');//done
        Route::apiResource('stores-vendors', StoreVendorController::class)->middleware('auth:store');//--
        Route::post('/orders/{orderId}/accept', [OrderController::class, 'acceptOrder'])->middleware('auth:store');
        Route::post('/orders/{orderId}/reject', [OrderController::class, 'rejectOrder'])->middleware('auth:store');
        Route::post('/orders/{orderId}/ship', [OrderController::class, 'shipOrder'])->middleware('auth:store');
        Route::post('/orders/{orderId}/complete-shipping', [OrderController::class, 'completeShipping'])->middleware('auth:store');
        Route::get('/storeOrders', [OrderController::class, 'storeOrders'])->middleware('auth:store');
        Route::get('/wallet', [WalletController ::class, 'salesWithorders'])->middleware('auth:store');

        Route::get('/CurrentOrdersForStore', [OrderController::class, 'getCurrentOrdersForStore'])->middleware('auth:store');//done
        Route::get('/PreviousOrdersForStore', [OrderController::class, 'getPreviousOrdersForStore'])->middleware('auth:store');//done
        
    });

   




   

   


});