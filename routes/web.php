<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::post('products/user_update', [ProductController::class, 'updateUserProduct'])->name('products.user_update');
Route::post('products(favorite_add', [ProductController::class, 'addFavoriteProduct'])->name('products.favorite_add');
Route::post('products/favorite_delete', [ProductController::class, 'deleteFavoriteProduct'])->name('products.favorite_delete');
Route::resource('products', ProductController::class);

Route::resource('favorites', FavoriteController::class);

require __DIR__.'/auth.php';
