<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('post-route', function () {
    return 'ok i am post';
});

Route::post('create3', [ProductController::class, 'create3']);
Route::post('create4', [ProductController::class, 'create4']);
Route::put('update/{id}', [ProductController::class, 'update1']);
Route::put('update2/{id}', [ProductController::class, 'update2']);
Route::get('massUpdate', [ProductController::class, 'massUpdate']);
Route::delete('delete/{id}', [ProductController::class, 'delete']);
Route::delete('massDelete', [ProductController::class, 'massDelete']);

