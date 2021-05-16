<?php

use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;
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

Route::get('/', [ProductController::class, 'index']);
//products
Route::get('/products/index', [ProductController::class, 'index'])->name("product.show");
Route::get('/products/create', [ProductController::class, 'create'])->name("product.create");
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name("product.edit");
Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name("product.delete");
Route::post('/products/store', [ProductController::class, 'store'])->name("product.store");
Route::post('/products/update/{id}', [ProductController::class, 'update'])->name("product.update");
Route::post('/products/destroy/{id}', [ProductController::class, 'destroy'])->name("product.destroy");

//users
Route::get('/users/index', [UserController::class, 'index'])->name("user.show");
Route::get('/users/create', [UserController::class, 'create'])->name("user.create");
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name("user.edit");
Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name("user.delete");
Route::post('/users/store', [UserController::class, 'store'])->name("user.store");
Route::post('/users/update/{id}', [UserController::class, 'update'])->name("user.update");
Route::post('/users/destroy/{id}', [UserController::class, 'destroy'])->name("user.destroy");

//brands
Route::get('/brands/index', [BrandController::class, 'index'])->name("brand.show");
Route::get('/brands/create', [BrandController::class, 'create'])->name("brand.create");
Route::get('/brands/edit/{id}', [BrandController::class, 'edit'])->name("brand.edit");
Route::get('/brands/delete/{id}', [BrandController::class, 'delete'])->name("brand.delete");
Route::post('/brands/store', [BrandController::class, 'store'])->name("brand.store");
Route::post('/brands/update/{id}', [BrandController::class, 'update'])->name("brand.update");
Route::post('/brands/destroy/{id}', [BrandController::class, 'destroy'])->name("brand.destroy");

