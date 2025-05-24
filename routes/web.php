<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SubCategoryController;

Route::get('/', [HomeController::class, 'index'])->name('home');

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

    Route::resource('brand', BrandController::class);
    
});



require __DIR__ . '/auth.php';
