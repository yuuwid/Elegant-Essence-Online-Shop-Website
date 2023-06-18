<?php

use App\Http\Controllers\CategoryManagementController;
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
Route::prefix('image/temp')->group(function () {
    Route::post('/upload', [UploadImageController::class, 'upload_one_to_temp']);
    Route::get('/path/{id}', [UploadImageController::class, 'temp_image_by_id']);
    Route::post('/upload/batch', [UploadImageController::class, 'upload_batch_to_temp']);
    Route::get('/path/batch/{ids}', [UploadImageController::class, 'temp_batch_image_by_ids']);
});


Route::get('/categories', [CategoryManagementController::class, 'api_categories']);

// READ
Route::get('/sizes/{id_size}', [ColorSizeManagementController::class, 'api_get_size_by_id']);
// UPDATE
Route::put('/sizes/{id_size}', [ColorSizeManagementController::class, 'api_update_size']);
// DELETE
Route::delete('/sizes/{id_size}', [ColorSizeManagementController::class, 'api_delete_size']);

// READ
Route::get('/colors/{id_color}', [ColorSizeManagementController::class, 'api_get_color_by_id']);
// UPDATE
Route::put('/colors/{id_color}', [ColorSizeManagementController::class, 'api_update_color']);
// DELETE
Route::delete('/colors/{id_color}', [ColorSizeManagementController::class, 'api_delete_color']);


Route::get('/test', [UploadImageController::class, 'test']);
Route::post('/test', [UploadImageController::class, 'test_post']);
