<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $restaurants = Restaurant::all();
    $products = Product::all();
    $categories = Category::all();
    return view('dashboard.dashboard', ['restaurants' => $restaurants, 'products' => $products, 'categories'=> $categories]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/qr', function () {
    return view('dashboard.qr');
})->middleware(['auth', 'verified'])->name('dashboard.qr');

Route::get('/dashboard/users', function () {
    return view('dashboard.users');
})->middleware(['auth', 'verified'])->name('dashboard.users');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('restaurants', RestaurantController::class);

require __DIR__.'/auth.php';
