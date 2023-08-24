<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::group(['prefix'=>'admin'],function (){
    Route::get('login', 'AuthController@index')->name('admin.login');
    Route::POST('login', 'AuthController@login')->name('admin.login');
});

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function (){
    Route::get('/', function () {
        return view('admin/index');
    })->name('adminHome');

    #=======================================================================
    #============================ Admin ====================================
    #=======================================================================
    Route::resource('admins',AdminController::class);
    Route::POST('delete_admin',[AdminController::class,'delete'])->name('delete_admin');
    Route::get('my_profile',[AdminController::class,'myProfile'])->name('myProfile');
    Route::get('logout', [AuthController::class,'logout'])->name('admin.logout');



});




#=======================================================================
#============================ root =====================================
#=======================================================================
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('key:generate');
    Artisan::call('jwt:secret');
    Artisan::call('config:clear');
    Artisan::call('optimize:clear');
    echo 'composer dump-autoload complete';
});









