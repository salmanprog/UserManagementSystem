<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiAuthorization;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\UserCardController;
use App\Http\Controllers\Api\PayoutController;

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
Route::middleware([ApiAuthorization::class])->group(function(){

    Route::post('video/thumbnail',[GeneralController::class,'videoThumbnail'])->name('video-thumbnail');

    Route::post('user/login',[UserController::class,'login'])->name('api.login');
    Route::post('user/forgot-password',[UserController::class,'forgotPassword'])->name('api.forgot-password');
    Route::post('user/change-password',[UserController::class,'changePassword'])->name('api.change-password');
    Route::post('user/logout',[UserController::class,'userLogout'])->name('api.logout');
    Route::post('user/social-login',[UserController::class,'socialLogin'])->name('api.social-login');
    Route::post('user/verify-code',[UserController::class,'verifyCode'])->name('api.verify-code');
    Route::post('user/resend-code',[UserController::class,'resendCode'])->name('api.resend-code');
    Route::resource('user',UserController::class)->except(['delete']);

    Route::middleware(['custom_auth:api'])->group(function(){

    

    });
});
