<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Wishlist;
use App\Http\Controllers\WishlistController;
use App\Models\Carts;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::prefix('category')->group(function() {
    Route::get('/', [HomepageController::class, 'category'])->name('category');
    Route::get('/{category:slug}', [HomepageController::class, 'show']);
    Route::get('/{category:slug}/{product:slug}', [HomepageController::class, 'categoryProduct'])->name("categoryProduct");
    Route::get('/{category:slug}/{product:slug}/ratings', [HomepageController::class, 'viewRating'])->name("ratings");
});

Route::group(["middleware" => ["auth"]], function() {
    Route::get('/load-cart-data', [CartsController::class, 'cartCount']);
    Route::get('/load-wishlist-data', [WishlistController::class, 'wishlistCount']);

    Route::prefix('carts')->group(function() {
        Route::get('/', [CartsController::class, 'show'])->name('carts');
        Route::post('/cart-delete/{id}', [CartsController::class, 'destroy']);
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
        Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place-order');
    });
    Route::prefix('wishlist')->group(function() {
        Route::get('/', [WishlistController::class, 'index'])->name('wishlist');
        Route::post('/remove-wishlist/{id}', [WishlistController::class, 'destroy']);
    });
});

Route::post('/wishlist/add-to-wishlist', [WishlistController::class, 'addWishlist'])->name('wishlist-post');

Route::prefix('carts')->group(function() {
    Route::post('/add-to-cart', [CartsController::class, 'addProduct'])->name('cart-post');
    Route::post('/update-cart', [CartsController::class, 'update'])->name('cart-update');
});

Auth::routes();
// Authentication Routes...
// $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('login', 'Auth\LoginController@login');
// $this->post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(["middleware" => ["auth"]], function() {
    Route::prefix('/dashboard')->group(function() {
        // dashboard page
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('/category')->group(function() {
            // get all category
            Route::get('/', [CategoryController::class, 'index'])->name('admin_category');
            // get edit category selected
            Route::get('/edit/{category:id}', [CategoryController::class, 'edit']);
            // insert category selected
            Route::put('/update/{category:id}', [CategoryController::class, 'update']);
            // delete category selected
            Route::delete('/delete/{category:id}', [CategoryController::class, 'destroy']);
            // add products
            Route::get('/add-category', [CategoryController::class, 'adding'])->name('add-category');
            // insert products
            Route::post('/add-category', [CategoryController::class, 'add'])->name('insert-category');
        });

        Route::prefix('products')->group(function() {
            // get all products
            Route::get('/', [ProductsController::class, 'index'])->name('admin_products');
            // add products
            Route::get('/add-products', [ProductsController::class, 'store'])->name('add-products');
            // insert products
            Route::post('/add-products', [ProductsController::class, 'insert'])->name('insert-products');
            // get edit products selected
            Route::get('/edit/{product:id}', [ProductsController::class, 'edit']);
            // insert edit products selected
            Route::put('/update/{product:id}', [ProductsController::class, 'update'])->name('update-products');
            // delete products selected
            Route::delete('/delete/{product:id}', [ProductsController::class, 'destroy'])->name('delete-products');
        });

        Route::prefix('/orders')->group(function() {
            Route::get('/', [OrdersController::class, 'index'])->name('orders-page');
            Route::get('/view-order/{order:id}', [OrdersController::class, 'views'])->name('view-orders');
            Route::post('/update-order/{order:id}', [OrdersController::class, 'update']);
            Route::get('/order-history', [OrdersController::class, 'history'])->name('order-history');
            Route::get('/rating/{id}', [OrdersController::class, 'viewRating']);
            Route::post('/rating-product', [OrdersController::class, 'postRating']);
        });

        Route::prefix('/users')->group(function() {
            Route::get('/', [DashboardController::class, 'users'])->name('users-page');
            Route::get('/view-user/{user:id}', [DashboardController::class, 'view']);
        });
    });
});