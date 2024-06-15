<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\BasketProductController;
use App\Http\Controllers\Brand\BrandPublicController;
use App\Http\Controllers\Brand\BrandAdminController;
use App\Http\Controllers\CategoryChar\CategoryCharAdminController;
use App\Http\Controllers\CategoryChar\CategoryCharPublicController;
use App\Http\Controllers\CategoryCharValue\CategoryCharValueAdminController;
use App\Http\Controllers\CategoryCharValue\CategoryCharValuePublicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPublicController;
use App\Http\Controllers\Order\OrderAdminController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\ProductAdminController;
use App\Http\Controllers\Product\ProductImageAdd;
use App\Http\Controllers\Product\ProductPublicController;
use App\Http\Controllers\Product\ProductUpdateController;
use App\Http\Controllers\Status\StatusAdminController;
use App\Http\Controllers\Status\StatusPublicController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminPanelMiddleware;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('basket', BasketProductController::class);
    Route::apiResource('order', OrderController::class);

    // Route::patch('basket', [BasketProductController::class, 'update']); //* для теста


    Route::middleware(['auth:sanctum', 'admin_panel'])->group(function () {
        Route::apiResource('categoriesAdmin', CategoryController::class);
        Route::apiResource('brandsAdmin', BrandAdminController::class);
        Route::apiResource('categoryCharAdmin', CategoryCharAdminController::class);
        Route::apiResource('categoryCharValueAdmin', CategoryCharValueAdminController::class);
        Route::apiResource('productAdmin', ProductAdminController::class);
        Route::apiResource('productAdminImage', ProductImageAdd::class);
        Route::apiResource('statusesAdmin', StatusAdminController::class);
        Route::apiResource('orderAdmin', OrderAdminController::class);

        Route::post('updateProduct', [ProductUpdateController::class, 'method']); //* -> в однометодный
    });
});
Route::apiResource('categoriesPublic', CategoryPublicController::class);
Route::apiResource('brandsPublic', BrandPublicController::class);
Route::apiResource('categoryCharPublic', CategoryCharPublicController::class);
Route::apiResource('categoryCharValuePublic', CategoryCharValuePublicController::class);
Route::apiResource('productPublic', ProductPublicController::class);
Route::apiResource('statusesPublic', StatusPublicController::class);

Route::apiResource('test', TestController::class); //* это можно удалять



Route::get('/1', function () {
    return ['Laravel' => app()->version()];
});

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