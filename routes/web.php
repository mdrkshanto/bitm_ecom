<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BitmEcomController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [BitmEcomController::class,'index'])->name('home');
Route::get('/category-product', [BitmEcomController::class,'category'])->name('category.product');
Route::get('/product-detail', [BitmEcomController::class,'productDetail'])->name('product.detail');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::controller(CategoryController::class)->group(function (){
        Route::get('/category/add','index')->name('category.add');
        Route::get('/category/edit/{id}','edit')->name('category.edit');
        Route::post('/category/add','create')->name('category.add');
        Route::post('/category/edit/{id}','update')->name('category.edit');
        Route::get('/category/manage','manage')->name('category.manage');
        Route::get('/category/delete/{id}','delete')->name('category.delete');
    });
});
