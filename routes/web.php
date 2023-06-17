<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\BrandManagementController;
use App\Http\Controllers\ProdukManagementController;
use App\Http\Controllers\CategoryManagementController;
use App\Http\Controllers\ColorSizeManagementController;

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

Route::get('/admin/login', [AuthAdminController::class, 'login_form'])
    ->name('admin.login');
Route::post('/admin/auth/login', [AuthAdminController::class, 'handle_login'])
    ->name('admin.handle.login');
Route::get('/admin/auth/logout', [AuthAdminController::class, 'handle_logout'])
    ->name('admin.handle.logout');

Route::get('/admin', [AdminController::class, 'dashboard'])
    ->middleware('auth:web_admin')
    ->name('admin.dashboard');


// PRODUK
Route::get('/admin/dashboard/list-produk', [ProdukManagementController::class, 'list_produk'])
    ->middleware('auth:web_admin')
    ->name('admin.m.list_produk');
Route::get('/admin/dashboard/list-produk/search', [ProdukManagementController::class, 'search_produk'])
    ->middleware('auth:web_admin')
    ->name('admin.m.search_produk');
// Add Produk
Route::get('/admin/dashboard/list-produk/m/add', [ProdukManagementController::class, 'index_add_produk'])
    ->middleware('auth:web_admin')
    ->name('admin.m.add_produk');
Route::post('/admin/dashboard/list-produk/h/add', [ProdukManagementController::class, 'add_produk'])
    ->middleware('auth:web_admin')
    ->name('admin.h.list_produk'); # handle
// Add Produk End

// Detail / Update Produk
Route::get('/admin/dashboard/list-produk/m/detail', [ProdukManagementController::class, 'index_detail_produk'])
    ->middleware('auth:web_admin')
    ->name('admin.m.detail_produk');
Route::post('/admin/dashboard/list-produk/h/detail', [ProdukManagementController::class, 'update_produk'])
    ->middleware('auth:web_admin') # handle
    ->name('admin.h.detail_produk');
// Detail / Update Produk End

// BRAND
Route::get('/admin/dashboard/list-brand', [BrandManagementController::class, 'list_brand'])
    ->middleware('auth:web_admin')
    ->name('admin.m.list_brand');
Route::get('/admin/dashboard/list-brand/search', [BrandManagementController::class, 'search_brand'])
    ->middleware('auth:web_admin')
    ->name('admin.m.search_brand');

// ADD BRAND
Route::get('/admin/dashboard/list-brand/m/add', [BrandManagementController::class, 'index_add_brand'])
    ->middleware('auth:web_admin')
    ->name('admin.m.add_brand');
Route::post('/admin/dashboard/list-brand/h/add', [BrandManagementController::class, 'add_brand'])
    ->middleware('auth:web_admin')
    ->name('admin.h.add_brand');

// VIEW AND EDIT BRAND
Route::get('/admin/dashboard/list-brand/m/view/{slug_brand}', [BrandManagementController::class, 'info_brand'])
    ->middleware('auth:web_admin')
    ->name('admin.m.view_brand');
Route::post('/admin/dashboard/list-brand/h/update/{slug_brand}', [BrandManagementController::class, 'update_brand'])
    ->middleware('auth:web_admin')
    ->name('admin.h.update_brand');
Route::post('/admin/dashboard/list-brand/h/delete/{slug_brand}', [BrandManagementController::class, 'delete_brand'])
    ->middleware('auth:web_admin')
    ->name('admin.h.delete_brand');

// KATEGORI
Route::get('/admin/dashboard/list-categories', [CategoryManagementController::class, 'list_category'])
    ->middleware('auth:web_admin')
    ->name('admin.m.list_categories');
Route::get('/admin/dashboard/list-categories/search', [CategoryManagementController::class, 'search_category'])
    ->middleware('auth:web_admin')
    ->name('admin.m.search_categories');

// ADD KATEGORI
Route::get('/admin/dashboard/list-categories/m/add', [CategoryManagementController::class, 'index_add_category'])
    ->middleware('auth:web_admin')
    ->name('admin.m.add_category');
Route::post('/admin/dashboard/list-categories/h/add', [CategoryManagementController::class, 'add_category'])
    ->middleware('auth:web_admin')
    ->name('admin.h.add_category');

// VIEW AND EDIT KATEGORI
Route::get('/admin/dashboard/list-categories/m/view/{slug_category}', [CategoryManagementController::class, 'info_category'])
    ->middleware('auth:web_admin')
    ->name('admin.m.view_category');
Route::post('/admin/dashboard/list-categories/h/update/{slug_category}', [CategoryManagementController::class, 'update_category'])
    ->middleware('auth:web_admin')
    ->name('admin.h.update_category');
Route::post('/admin/dashboard/list-categories/h/delete/{slug_category}', [CategoryManagementController::class, 'delete_category'])
    ->middleware('auth:web_admin')
    ->name('admin.h.delete_category');


// UKURAN
Route::get('/admin/dashboard/list-colors-sizes', [ColorSizeManagementController::class, 'list_color_size'])
    ->middleware('auth:web_admin')
    ->name('admin.m.list_color_size');

Route::post('/admin/dashboard/list-colors-sizes/h/add/size', [ColorSizeManagementController::class, 'add_size'])
    ->middleware('auth:web_admin')
    ->name('admin.h.add_size');

Route::post('/admin/dashboard/list-colors-sizes/h/add/color', [ColorSizeManagementController::class, 'add_color'])
    ->middleware('auth:web_admin')
    ->name('admin.h.add_color');
