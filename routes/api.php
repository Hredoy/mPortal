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
    // Route::resource('category', \App\Http\Controllers\API\Backend\CategoryController::class);
    Route::resource('upload', \App\Http\Controllers\API\Backend\UploadController::class);
    // category wise Product
    Route::get('music', [\App\Http\Controllers\API\Backend\UploadController::class, 'music']);
    Route::get('comedy', [\App\Http\Controllers\API\Backend\UploadController::class, 'comedy']);
    Route::get('talent', [\App\Http\Controllers\API\Backend\UploadController::class, 'talent']);
    //Comments Route:
    Route::get('/comment/store', [\App\Http\Controllers\API\Backend\UploadController::class, 'talent']);
    Route::get('/reply/store', [\App\Http\Controllers\API\Backend\UploadController::class, 'talent']);
     //like Route
    Route::get('like/{id}', [\App\Http\Controllers\API\Backend\UploadController::class, 'talent']);
    Route::get('unlike/{id}', [\App\Http\Controllers\API\Backend\UploadController::class, 'talent']);
      //follow Route
    Route::get('follow/{id}', [\App\Http\Controllers\API\Backend\UploadController::class, 'talent']);
    Route::get('unfollow/{id}', [\App\Http\Controllers\API\Backend\UploadController::class, 'talent']);






      // Site Settings Route.
    Route::get('site/settings', [\App\Http\Controllers\API\Backend\UploadController::class, 'talent']);
    Route::resource('menu', \App\Http\Controllers\API\Backend\UploadController::class);



// });
