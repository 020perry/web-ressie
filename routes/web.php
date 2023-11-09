<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\NoCacheMiddleware;
use App\Http\Controllers\{
    ProductController, MenuController, ProfileController, CategoryController
};
use App\Models\{Category, Product, Menu};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome')->middleware('guest');

Route::middleware(['auth', 'verified', 'nocache'])->group(function () {
    Route::view('/dashboard', 'dashboard.dashboard', [
        'menus' => Menu::all(),
        'products' => Product::all(),
        'categories'=> Category::all()
    ])->name('dashboard');

    Route::view('/dashboard/qr', 'dashboard.qr')->name('dashboard.qr');
    Route::view('/dashboard/users', 'dashboard.users')->name('dashboard.users');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Product Routes
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index')->name('products.index');
        Route::get('/products/create', 'create')->name('products.create');
        Route::post('/products', 'store')->name('products.store');
        Route::get('/products/{product}', 'show')->name('products.show');
        Route::get('/products/{product}/edit', 'edit')->name('products.edit');
        Route::put('/products/{product}', 'update')->name('products.update');
        Route::delete('/products/{product}', 'destroy')->name('products.destroy');
    });

// Category Routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('categories.index');
        Route::get('/categories/create', 'create')->name('categories.create');
        Route::post('/categories', 'store')->name('categories.store');
        Route::get('/categories/{category}', 'show')->name('categories.show');
        Route::get('/categories/{category}/edit', 'edit')->name('categories.edit');
        Route::put('/categories/{category}', 'update')->name('categories.update');
        Route::delete('/categories/{category}', 'destroy')->name('categories.destroy');
    });

// Menu Routes
    Route::controller(MenuController::class)->group(function () {
        Route::get('/menu', 'index')->name('menus.index');
        Route::get('/menus/create', 'create')->name('menus.create');
        Route::post('/menus', 'store')->name('menus.store');
        Route::get('/menus/{menu}', 'show')->name('menus.show');
        Route::get('/menus/{menu}/edit', 'edit')->name('menus.edit');
        Route::put('/menus/{menu}', 'update')->name('menus.update');
        Route::delete('/menus/{menu}', 'destroy')->name('menus.destroy');
    });

    // API-like routes for fetching data
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'fetchProducts']);
    Route::get('/menus', [App\Http\Controllers\MenuController::class, 'fetchMenus']);
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'fetchCategories']);
});

// Auth routes
require __DIR__.'/auth.php';
