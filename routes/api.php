<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ResetPassword\ForgotPasswordController;
use App\Http\Controllers\Api\ResetPassword\ResetPasswordController;
use App\Http\Controllers\Api\UserController;
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

Route::group(['middleware' => 'check-lang'], function (){

    Route::group(['prefix' => 'auth','middleware' => 'jwt'], function () {

    Route::get('getProfile',[UserController::class,'getProfile']);
    Route::post('updateProfile',[UserController::class,'updateProfile']);
    Route::post('logout',[UserController::class,'logout']);
    Route::post('changePassword',[UserController::class,'changePassword']);
    Route::post('deleteAccount',[UserController::class,'deleteAccount']);

    });



    Route::group(['prefix' => 'orders','middleware' => 'jwt'], function () {

        Route::get('getAllPlaces',[OrderController::class,'getAllPlaces']);
        Route::get('ordersCompleted',[OrderController::class,'ordersCompleted']);
        Route::get('ordersNotCompleted',[OrderController::class,'ordersNotCompleted']);
        Route::post('addNewOrder',[OrderController::class,'addNewOrder']);


    });


    Route::post('checkPhone',  [ForgotPasswordController::class,'checkPhone']);
    Route::post('resetPassword', [ResetPasswordController::class,'resetPassword']);


    Route::get('cities',[UserController::class,'getAllCities']);
    Route::post('auth/register',[UserController::class,'register']);
    Route::post('auth/login',[UserController::class,'login']);

});
