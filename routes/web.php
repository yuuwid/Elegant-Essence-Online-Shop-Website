<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\BrandManagementController;
use App\Http\Controllers\ProdukManagementController;
use App\Http\Controllers\CategoryManagementController;
use App\Http\Controllers\ColorSizeManagementController;
use App\Http\Controllers\HomeController;

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

// ADMIN AUTHENTICATE
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/login', [AuthAdminController::class, 'login_form'])
            ->name('login');

        Route::post('/auth/login', [AuthAdminController::class, 'handle_login'])
            ->name('handle.login');

        Route::get('/auth/logout', [AuthAdminController::class, 'handle_logout'])
            ->name('handle.logout');
    });

Route::prefix('admin')
    ->middleware('auth:web_admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'dashboard'])
            ->name('dashboard');

        Route::get('/profile', [AdminController::class, 'profile'])
            ->name('profile');

        Route::post('/profile/edit', [AdminController::class, 'edit_profile'])
            ->name('edit-profile');
    });


// TRANSAKSI
Route::prefix('admin/dashboard/transaksi')
    ->middleware('auth:web_admin')
    ->name('admin.transaksi.')
    ->group(function () {
        Route::get('/', [AdminTransaksiController::class, 'list_transaksi']);
        Route::get('/baru', [AdminTransaksiController::class, 'list_transaksi_baru']);
        Route::get('/diproses', [AdminTransaksiController::class, 'list_transaksi_diproses']);
        Route::get('/dikirim', [AdminTransaksiController::class, 'list_transaksi_dikirim']);
        Route::get('/selesai', [AdminTransaksiController::class, 'list_transaksi_selesai']);
        Route::get('/detail/{no_transaksi}', [AdminTransaksiController::class, 'detail_transaksi']);
    });


// PRODUK (m --> Manage) | GET Method
Route::prefix('admin/dashboard/list-produk')
    ->middleware('auth:web_admin')
    ->name('admin.m.')
    ->group(function () {
        // View Product
        Route::get('/', [ProdukManagementController::class, 'list_produk'])
            ->name('list_produk');
        Route::get('/search', [ProdukManagementController::class, 'search_produk'])
            ->name('search_produk');

        // Create Product
        Route::get('/m/add', [ProdukManagementController::class, 'index_add_produk'])
            ->name('add_produk');

        // Detail Product
        // TODO: Develop
        Route::get('/m/detail', [ProdukManagementController::class, 'index_detail_produk'])
            ->name('detail_produk');
    });


// PRODUK (h --> Handle) | POST Method
Route::prefix('admin/dashboard/list-produk')
    ->middleware('auth:web_admin')
    ->name('admin.h.')
    ->group(function () {

        // Create Product Handle
        Route::post('/h/add', [ProdukManagementController::class, 'add_produk'])
            ->name('add_produk');

        // Update Product
        // TODO: Develop
        Route::post('/admin/dashboard/list-produk/h/detail', [ProdukManagementController::class, 'update_produk'])
            ->name('admin.h.detail_produk');
    });


// BRAND (m --> Manage) | GET Method
Route::prefix('admin/dashboard/list-brand')
    ->middleware('auth:web_admin')
    ->name('admin.m.')
    ->group(function () {

        // View Brand
        Route::get('/', [BrandManagementController::class, 'list_brand'])
            ->name('list_brand');
        Route::get('/search', [BrandManagementController::class, 'search_brand'])
            ->name('search_brand');

        // Create Brand
        Route::get('/m/add', [BrandManagementController::class, 'index_add_brand'])
            ->name('add_brand');

        // Detail Brand
        Route::get('/m/view/{slug_brand}', [BrandManagementController::class, 'info_brand'])
            ->name('view_brand');
    });


// PRODUK (h --> Handle) | POST Method
Route::prefix('admin/dashboard/list-brand')
    ->middleware('auth:web_admin')
    ->name('admin.h.')
    ->group(function () {
        // Create Brand
        Route::post('/h/add', [BrandManagementController::class, 'add_brand'])
            ->name('add_brand');

        // Update Brand
        Route::post('/h/update/{slug_brand}', [BrandManagementController::class, 'update_brand'])
            ->name('update_brand');

        // Delete Brand
        Route::post('/h/delete/{slug_brand}', [BrandManagementController::class, 'delete_brand'])
            ->name('delete_brand');
    });

// CATEGORY (m --> Manage) | GET Method
Route::prefix('admin/dashboard/list-categories')
    ->name('admin.m.')
    ->middleware('auth:web_admin')
    ->group(function () {
        // View Category
        Route::get('', [CategoryManagementController::class, 'list_category'])
            ->name('list_categories');
        Route::get('/search', [CategoryManagementController::class, 'search_category'])
            ->name('search_categories');

        // Create Category
        Route::get('/m/add', [CategoryManagementController::class, 'index_add_category'])
            ->name('add_category');

        // Detail Category
        Route::get('/m/view/{slug_category}', [CategoryManagementController::class, 'info_category'])
            ->name('view_category');
    });


// CATEGORY (h --> Handle) | POST Method
Route::prefix('admin/dashboard/list-categories')
    ->middleware('auth:web_admin')
    ->name('admin.h.')
    ->group(function () {

        Route::post('/h/add', [CategoryManagementController::class, 'add_category'])
            ->name('add_category');

        Route::post('/h/add', [CategoryManagementController::class, 'add_category'])
            ->name('add_category');

        Route::post('/h/update/{slug_category}', [CategoryManagementController::class, 'update_category'])
            ->name('update_category');
        Route::post('/h/delete/{slug_category}', [CategoryManagementController::class, 'delete_category'])
            ->name('delete_category');
    });


// UKURAN
Route::prefix('admin/dashboard/list-colors-sizes')
    ->middleware('auth:web_admin')
    ->name('admin.')
    ->group(function () {

        // View Color Size (m --> Manage)
        Route::get('/', [ColorSizeManagementController::class, 'list_color_size'])
            ->name('m.list_color_size');

        // Create Size (h --> Handle)
        Route::post('/h/add/size', [ColorSizeManagementController::class, 'add_size'])
            ->name('h.add_size');

        // Create Color (h --> Handle)
        Route::post('/h/add/color', [ColorSizeManagementController::class, 'add_color'])
            ->name('h.add_color');
    });


Route::get('/user', [HomeController::class, 'index'])
    ->name('landing-page');

Route::view('/user/produk', 'user.product_detail')->name('products_detail');

Route::view('/user/cart', 'user.cart')->name('cart');

Route::view('/user/wishlist', 'user.wishlist')->name('wishlist');

Route::get('/login', function () {
    return view('auth.user.login.index');
});
Route::get('/registrasi', function () {
    return view('auth.user.registrasi.index');
});
