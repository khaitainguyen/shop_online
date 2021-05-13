<?php

use App\Http\Controllers\Backend\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products/index', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
Route::get('/products/delete/{id}', [ProductController::class, 'delete']);
Route::post('/products/store', [ProductController::class, 'store']);
Route::post('/products/update/{article_id}', [ProductController::class, 'update']);
Route::post('/products/destroy/{article_id}', [ProductController::class, 'destroy']);
