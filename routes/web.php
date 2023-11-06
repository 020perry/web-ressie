<?php

use Illuminate\Support\Facades\Route;
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

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
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

    // Resourceful routes for products, categories, and menus
    Route::resources([
        'products' => ProductController::class,
        'categories' => CategoryController::class,
    ]);

// Show a list of menus
    Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');

// Show the form to create a new menu
    Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');

// Store a new menu
    Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');

// Show the form to edit an existing menu
    Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');

// Update an existing menu
    Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('menus.update');

// Delete an existing menu
    Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');

    // API-like routes for fetching data
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'fetchProducts']);
    Route::get('/menus', [App\Http\Controllers\MenuController::class, 'fetchMenus']);
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'fetchCategories']);
});

// Separate views that do not require authentication
Route::view('/dash', 'dashboard');
Route::view('/test', 'test');

// Auth routes
require __DIR__.'/auth.php';
