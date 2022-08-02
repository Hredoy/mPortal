<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Registered, activated, and is admin routes.
// Route::middleware('auth:api')->group( function () {
    Route::resource('category', \App\Http\Controllers\API\Backend\CategoryController::class);
    Route::resource('upload', \App\Http\Controllers\API\Backend\UploadController::class);
    // category wise Product
    Route::get('music', [\App\Http\Controllers\API\Backend\UploadController::class, 'music']);
    Route::get('comedy', [\App\Http\Controllers\API\Backend\UploadController::class, 'comedy']);
    Route::get('talent', [\App\Http\Controllers\API\Backend\UploadController::class, 'talent']);
    

// });
