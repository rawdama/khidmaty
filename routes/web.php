<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductStoreController;
use App\Http\Controllers\ProductDepartmentController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OpnionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\RatingStoreController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\demo\DemoStoreController;
use App\Http\Controllers\demo\DemoAboutusController;
use App\Http\Controllers\demo\DemoBlogController;
use App\Http\Controllers\demo\DemoSettingController;
use App\Http\Controllers\demo\DemoFAQSController;
use App\Http\Controllers\demo\DemoContactController;
use App\Http\Controllers\demo\DemoHomeController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('auth.login');
});




// Localization routes
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ]
], function () {
   
    Route::get('demoStores',[DemoStoreController::class,'getStores'])->name('demoStores');
    Route::get('/searchStores', [DemoStoreController::class, 'searchStore'])->name('stores.search');
    Route::get('/aboutus', [DemoAboutusController::class, 'index'])->name('aboutuse');
    Route::get('/allBlogs', [DemoBlogController::class, 'index'])->name('allBlogs');
    Route::get('/blog/{id}', [DemoBlogController::class, 'show'])->name('blog.show');
    Route::get('/privacy-policy', [DemoSettingController::class, 'PrivacyPolicy'])->name('privacy-policy');
    Route::get('/terms-conditions', [DemoSettingController::class, 'TermsCondition'])->name('terms-conditions');
    Route::get('/FAQS', [DemoFAQSController::class, 'index'])->name('FAQS');
    Route::get('/contact-us', [DemoContactController::class, 'index'])->name('contect.index');
    Route::post('/contact/form', [DemoContactController::class, 'store'])->name('contact.store');
    Route::get('/home', [DemoHomeController::class, 'index'])->name('home');








    Route::get('/dashboard', function () {
        return view('layouts.dash'); 
    })->name('dashboard')->middleware('auth:admin');

    
    Route::resource('cars', CarController::class)->middleware('auth:admin');
    Route::resource('sliders', SliderController::class)->middleware('auth:admin');
    Route::resource('admins', AdminController::class);
    Route::get('/admin/profile', [AdminController::class, 'showProfile'])->name('admin.profile')->middleware('auth:admin');;
    Route::put('/admin/profile', [AdminController::class, 'updateAdminProfile'])->name('admin.updateProfile')->middleware('auth:admin');;
    Route::put('/admin/profile/password', [AdminController::class, 'updatePassword'])->name('admin.updatePassword')->middleware('auth:admin');;


    Route::resource('product-store', ProductStoreController::class)->middleware('auth:admin');
    Route::resource('product-departments', ProductDepartmentController::class)->middleware('auth:admin');
    Route::resource('product-type', ProductTypeController::class)->middleware('auth:admin');
    Route::resource('brands', BrandController::class)->middleware('auth:admin');
    Route::resource('stores', StoreController::class);
    Route::resource('questions', QuestionController::class)->middleware('auth:admin');
    Route::resource('opnions', OpnionController::class)->middleware('auth:admin');
    Route::resource('blogs', BlogController::class)->middleware('auth:admin');
    Route::resource('clients', ClientController::class);
    Route::resource('products', ProductController::class)->middleware('auth:admin');
    Route::resource('ratings', RatingController::class);
    Route::resource('orders', OrderController::class);
    Route::patch('/clients/{client}/offer', [ClientController::class, 'updateOffer']);
    Route::patch('/stores/{store}/offer', [StoreController::class, 'updateOffer']);
    Route::resource('/wallets', WalletController::class);
    Route::get('/topSellingStores',[WalletController::class , 'topSellingStores'])->name('topSellingStores');
    Route::get('/mostPreferred',[RatingController::class , 'mostPreferred'])->name('mostPreferred-products');;
    Route::get('/mostPreferred-stores',[RatingStoreController::class , 'mostPreferred'])->name('mostPreferred-stores');;
    Route::get('/mostSoldProducts',[RatingController::class , 'mostSoldProducts'])->name('mostSoldProducts');
    Route::resource('settings', SettingController::class);
    
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});