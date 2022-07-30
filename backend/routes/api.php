<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ProfileController;



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

});

Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('update-profile', [ProfileController::class,'updateProfile'])->name('updateProfile');
    Route::post('change-password', [ProfileController::class,'changePassword'])->name('changePassword');

});
