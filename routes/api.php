<?php

use App\Http\Controllers\ColorSizeManagementController;
use App\Http\Controllers\UploadImageController;
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


// UPLOAD IMAGE
Route::post('/temp/image/upload', [UploadImageController::class, 'upload_one_to_temp']);
Route::get('/temp/image/path/{id}', [UploadImageController::class, 'temp_image_by_id']);

Route::post('/temp/image/upload/batch', [UploadImageController::class, 'upload_batch_to_temp']);
Route::get('/temp/image/path/batch/{ids}', [UploadImageController::class, 'temp_batch_image_by_ids']);

Route::get('/sizes/{id_size}', [ColorSizeManagementController::class, 'get_size_byId']);

Route::get('/test', [UploadImageController::class, 'test']);
Route::post('/test', [UploadImageController::class, 'test_post']);
