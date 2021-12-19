<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('categories')
    ->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('{id}', [CategoryController::class, 'show'])->name('categories.show');
        Route::put('{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

Route::prefix('customers')
    ->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
        Route::post('/', [CustomerController::class, 'store'])->name('customers.store');
        Route::get('{id}', [CustomerController::class, 'show'])->name('customers.show');
        Route::put('{id}', [CustomerController::class, 'update'])->name('customers.update');
        Route::delete('{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    });

Route::prefix('products')
    ->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::get('{id}', [ProductController::class, 'show'])->name('products.show');
        Route::put('{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

Route::prefix('orders')
    ->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::post('/', [OrderController::class, 'store'])->name('orders.store');
        Route::get('{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::put('{id}', [OrderController::class, 'update'])->name('orders.update');
        Route::delete('{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::get('discounts/{id}', [OrderController::class, 'discounts'])->name('orders.discounts');
    });
