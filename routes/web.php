<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
/* cart route */
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');

/* user route groups */
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* admin route group */
Route::group(['middleware' => ['auth', 'admin', 'verified'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('category', CategoryController::class);

    Route::resource('sub_category', SubCategoryController::class);
    /* get sub category by ajax reuquest */
    Route::post('/get-sub-category', [SubCategoryController::class, 'getSubCategory'])->name('getSubCategory');

    Route::resource('brand', BrandController::class);

    Route::resource('product', ProductController::class);
});



require __DIR__ . '/auth.php';
