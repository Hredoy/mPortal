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
// Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep', 'checkblocked']], function () {
//     Route::resource('/users/deleted', \App\Http\Controllers\SoftDeletesController::class, [
//         'only' => [
//             'index', 'show', 'update', 'destroy',
//         ],
//     ]);

    // Route::resource('users', \App\Http\Controllers\UsersManagementController::class, [
    //     'names' => [
    //         'index'   => 'users',
    //         'destroy' => 'user.destroy',
    //     ],
    //     'except' => [
    //         'deleted',
    //     ],
    // ]);
    Route::resource('category', \App\Http\Controllers\API\Backend\CategoryController::class, [
        'names' => [
            'index'   => 'categories',
            'create'   => 'categories.create',
            'store'   => 'categories.store',
            'edit'   => 'categories.edit',
            'update'   => 'categories.update',
            'destroy' => 'categories.destroy',
            
        ],
        'except' => [
            'deleted',
        ],
    ]);
    Route::resource('video', \App\Http\Controllers\API\Backend\VideoController::class, [
        'names' => [
            'index'   => 'videos',
            'create'   => 'videos.create',
            'store'   => 'videos.store',
            'edit'   => 'videos.edit',
            'update'   => 'videos.update',
            'destroy' => 'video.destroy',
            
        ],
        'except' => [
            'deleted',
        ],
    ]);

// });
