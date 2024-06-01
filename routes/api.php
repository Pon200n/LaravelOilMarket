<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Brand\BrandPublicController;
use App\Http\Controllers\Brand\BrandAdminController;
use App\Http\Controllers\CategoryChar\CategoryCharAdminController;
use App\Http\Controllers\CategoryChar\CategoryCharPublicController;
use App\Http\Controllers\CategoryCharValue\CategoryCharValueAdminController;
use App\Http\Controllers\CategoryCharValue\CategoryCharValuePublicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPublicController;
use App\Http\Controllers\Product\ProductAdminController;
use App\Http\Controllers\Product\ProductImageAdd;
use App\Http\Controllers\Product\ProductPublicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminPanelMiddleware;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // Route::apiResource('categoriesAdmin', CategoryController::class);
    // Route::apiResource('brandsAdmin', BrandAdminController::class);
    // Route::apiResource('categoryCharAdmin', CategoryCharAdminController::class);
    // Route::apiResource('categoryCharValueAdmin', CategoryCharValueAdminController::class);

    Route::middleware(['auth:sanctum', 'admin_panel'])->group(function () {
        Route::apiResource('categoriesAdmin', CategoryController::class);
        Route::apiResource('brandsAdmin', BrandAdminController::class);
        Route::apiResource('categoryCharAdmin', CategoryCharAdminController::class);
        Route::apiResource('categoryCharValueAdmin', CategoryCharValueAdminController::class);
        Route::apiResource('productAdmin', ProductAdminController::class);
        Route::apiResource('productAdminImage', ProductImageAdd::class);
    });

    // });
    // Route::get('/testPosts', [PostController::class, 'testPosts'])->middleware(AdminPanelMiddleware::class);
    // Route::apiResource('posts',PostController::class)->middleware(AdminPanelMiddleware::class);
    // Route::apiResource('postsNoMW',PostController::class);
    // Route::get('admin_methods', function () {
    //     return 'admin_methods';
    // });
});
Route::apiResource('categoriesPublic', CategoryPublicController::class);
Route::apiResource('brandsPublic', BrandPublicController::class);
Route::apiResource('categoryCharPublic', CategoryCharPublicController::class);
Route::apiResource('categoryCharValuePublic', CategoryCharValuePublicController::class);
Route::apiResource('productPublic', ProductPublicController::class);


Route::apiResource('p', PostController::class);

// Route::get('/123', function () {
//     return ['Laravel' => app()->version()];
// })->middleware(AdminPanelMiddleware::class);

// Route::middleware(AdminPanelMiddleware::class)->group(function(){
//     // Route::apiResource('testPosts', PostController::class);
//     Route::get('/userMW', function (Request $request) {
//         return $request->user();
//     });
// });
// Route::group(['middleware'=>'admin_panel'],function(){
//     Route::get('/userMW2', function (Request $request) {
//         return $request->user();
//     });
// });

// Route::middleware(['auth:sanctum','admin_panel'])->group(function(){
//     Route::get('admin_methods', function () {
//         return 'admin_methods';
//     });
// });
Route::get('/1', function () {
    return ['Laravel' => app()->version()];
});
