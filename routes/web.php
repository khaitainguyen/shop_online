<?php

use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\FeedbackController;
use App\Http\Controllers\Backend\InformationController;
use App\Http\Controllers\Backend\IntroduceController;
use App\Http\Controllers\Backend\IntroduceDetailController;
use App\Http\Controllers\Backend\PartnerController;
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
//information
Route::get('/information', [InformationController::class, 'index'])->name("information.show");
Route::get('/information/create', [InformationController::class, 'create'])->name("information.create");
Route::post('/information/store', [InformationController::class, 'store'])->name("information.store");
Route::post('/information/update/{id}', [InformationController::class, 'update'])->name("information.update");

//brands
Route::get('/brands/index', [BrandController::class, 'index'])->name("brand.show");
Route::get('/brands/create', [BrandController::class, 'create'])->name("brand.create");
Route::get('/brands/edit/{id}', [BrandController::class, 'edit'])->name("brand.edit");
Route::get('/brands/delete/{id}', [BrandController::class, 'delete'])->name("brand.delete");
Route::post('/brands/store', [BrandController::class, 'store'])->name("brand.store");
Route::post('/brands/update/{id}', [BrandController::class, 'update'])->name("brand.update");
Route::post('/brands/destroy/{id}', [BrandController::class, 'destroy'])->name("brand.destroy");

//partners
Route::get('/partners/index', [PartnerController::class, 'index'])->name("partner.show");
Route::get('/partners/create', [PartnerController::class, 'create'])->name("partner.create");
Route::get('/partners/edit/{id}', [PartnerController::class, 'edit'])->name("partner.edit");
Route::get('/partners/delete/{id}', [PartnerController::class, 'delete'])->name("partner.delete");
Route::post('/partners/store', [PartnerController::class, 'store'])->name("partner.store");
Route::post('/partners/update/{id}', [PartnerController::class, 'update'])->name("partner.update");
Route::post('/partners/destroy/{id}', [PartnerController::class, 'destroy'])->name("partner.destroy");

//feedbacks
Route::get('/feedbacks/index', [FeedbackController::class, 'index'])->name("feedback.show");
Route::get('/feedbacks/create', [FeedbackController::class, 'create'])->name("feedback.create");
Route::get('/feedbacks/edit/{id}', [FeedbackController::class, 'edit'])->name("feedback.edit");
Route::get('/feedbacks/delete/{id}', [FeedbackController::class, 'delete'])->name("feedback.delete");
Route::post('/feedbacks/store', [FeedbackController::class, 'store'])->name("feedback.store");
Route::post('/feedbacks/update/{id}', [FeedbackController::class, 'update'])->name("feedback.update");
Route::post('/feedbacks/destroy/{id}', [FeedbackController::class, 'destroy'])->name("feedback.destroy");

//banners
Route::get('/banners/index', [BannerController::class, 'index'])->name("banner.show");
Route::get('/banners/create', [BannerController::class, 'create'])->name("banner.create");
Route::get('/banners/edit/{id}', [BannerController::class, 'edit'])->name("banner.edit");
Route::get('/banners/delete/{id}', [BannerController::class, 'delete'])->name("banner.delete");
Route::post('/banners/store', [BannerController::class, 'store'])->name("banner.store");
Route::post('/banners/update/{id}', [BannerController::class, 'update'])->name("banner.update");
Route::post('/banners/destroy/{id}', [BannerController::class, 'destroy'])->name("banner.destroy");

//categories
Route::get('/categories/index', [CategoryController::class, 'index'])->name("category.show");
Route::get('/categories/create', [CategoryController::class, 'create'])->name("category.create");
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name("category.edit");
Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name("category.delete");
Route::post('/categories/store', [CategoryController::class, 'store'])->name("category.store");
Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name("category.update");
Route::post('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name("category.destroy");

//introduces
Route::get('/introduces/index', [IntroduceController::class, 'index'])->name("introduce.show");
Route::get('/introduces/create', [IntroduceController::class, 'create'])->name("introduce.create");
Route::get('/introduces/edit/{id}', [IntroduceController::class, 'edit'])->name("introduce.edit");
Route::get('/introduces/delete/{id}', [IntroduceController::class, 'delete'])->name("introduce.delete");
Route::post('/introduces/store', [IntroduceController::class, 'store'])->name("introduce.store");
Route::post('/introduces/update/{id}', [IntroduceController::class, 'update'])->name("introduce.update");
Route::post('/introduces/destroy/{id}', [IntroduceController::class, 'destroy'])->name("introduce.destroy");

//introduce detail
Route::get('/introducedetail/index', [IntroduceDetailController::class, 'index'])->name("introducedetail.show");
Route::get('/introducedetail/create', [IntroduceDetailController::class, 'create'])->name("introducedetail.create");
Route::get('/introducedetail/edit/{id}', [IntroduceDetailController::class, 'edit'])->name("introducedetail.edit");
Route::get('/introducedetail/delete/{id}', [IntroduceDetailController::class, 'delete'])->name("introducedetail.delete");
Route::post('/introducedetail/store', [IntroduceDetailController::class, 'store'])->name("introducedetail.store");
Route::post('/introducedetail/update/{id}', [IntroduceDetailController::class, 'update'])->name("introducedetail.update");
Route::post('/introducedetail/destroy/{id}', [IntroduceDetailController::class, 'destroy'])->name("introducedetail.destroy");
