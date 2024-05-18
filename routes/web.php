<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PageHomeController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CategoryController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;



Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => 'sitesetting'], function () {
        Route::get('/', [PageHomeController::class,'index'])->name('home');

        Route::get('/products', [PageController::class,'products'])->name('products');
        Route::get('/smartproducts/{slug?}', [PageController::class,'products'])->name('smartproducts');
        Route::get('/computersproducts/{slug?}', [PageController::class, 'products'])->name('computersproducts');
        Route::get('/homesproducts/{slug?}', [PageController::class, 'products'])->name('homesproducts');
        Route::get('/discountproducts', [PageController::class, 'discountproducts'])->name('discountproducts');

        Route::get('/productdetails/{slug}', [PageController::class,'productdetails'])->name('productdetails');

        Route::get('/about', [PageController::class,'about'])->name('about');

        Route::get('/contact', [PageController::class,'contact'])->name('contact');
        Route::post('/contact/save', [AjaxController::class,'contactsave'])->name('contact.save');

        Route::get('/cart', [CartController::class,'index'])->name('cart');
        Route::get('/cart/bill', [CartController::class,'bill'])->name('cart.bill');
        Route::post('/cart/save', [CartController::class,'cartSave'])->name('cart.cartSave');


        Route::post('/cart/add', [CartController::class,'add'])->name('cart.add');
        Route::post('/cart/delete', [CartController::class,'delete'])->name('cart.delete');
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
        Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
        Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
        Route::get('/slider/add', [SliderController::class, 'create'])->name('slider.create');
        Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
        Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
        Route::put('/slider/{id}/update', [SliderController::class, 'update'])->name('slider.update');
        Route::delete('/slider/{id}/destroy', [SliderController::class, 'destroy'])->name('slider.destroy');

        Route::get('/order', [OrderController::class, 'index'])->name('order.index');
        Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
        Route::post('/order/{id}/update', [OrderController::class, 'update'])->name('order.store');
        Route::delete('/slider/destroy', [OrderController::class, 'destroy'])->name('order.destroy');

        Route::resource('/category', CategoryController::class);
        Route::get('/inbox', [InboxController::class, 'index'])->name('inbox.index');
        Route::get('/inbox/{id}/edit', [InboxController::class, 'edit'])->name('inbox.edit');
        Route::put('/inbox/{id}/update', [InboxController::class, 'update'])->name('inbox.update');

        Route::delete('/inbox/{id}/destroy', [InboxController::class, 'destroy'])->name('inbox.destroy');


        Route::resource('/item', ItemController::class)->except('destroy');
        Route::put('/item-status/update', [ItemController::class, 'status'])->name('item.status');
        Route::delete('/item/destroy', [ItemController::class, 'destroy'])->name('item.destroy');

    });
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
