<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BitmEcomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;

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

    Route::controller(SubcategoryController::class)->group(function (){
        Route::get('/subcategory/add','index')->name('subcategory.add');
        Route::get('/subcategory/edit/{id}','edit')->name('subcategory.edit');
        Route::post('/subcategory/add','create')->name('subcategory.add');
        Route::post('/subcategory/edit/{id}','update')->name('subcategory.edit');
        Route::get('/subcategory/manage','manage')->name('subcategory.manage');
        Route::get('/subcategory/delete/{id}','delete')->name('subcategory.delete');
    });

    Route::controller(BrandController::class)->group(function (){
        Route::get('/brand/add','index')->name('brand.add');
        Route::get('/brand/edit/{id}','edit')->name('brand.edit');
        Route::post('/brand/add','create')->name('brand.add');
        Route::post('/brand/edit/{id}','update')->name('brand.edit');
        Route::get('/brand/manage','manage')->name('brand.manage');
        Route::get('/brand/delete/{id}','delete')->name('brand.delete');
    });

    Route::controller(UnitController::class)->group(function (){
        Route::get('/unit/add','index')->name('unit.add');
        Route::get('/unit/edit/{id}','edit')->name('unit.edit');
        Route::post('/unit/add','create')->name('unit.add');
        Route::post('/unit/edit/{id}','update')->name('unit.edit');
        Route::get('/unit/manage','manage')->name('unit.manage');
        Route::get('/unit/delete/{id}','delete')->name('unit.delete');
    });
});
