<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::group(['prefix'=>'admin'],function (){
    Route::get('login', [AuthController::class,'index'])->name('admin.login');
    Route::POST('login', [AuthController::class,'login'])->name('admin.login');
});

Route::get('/', function () {
   return redirect()->route('adminHome');
});

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function (){
    Route::get('/', function () {
        return view('admin/index');
    })->name('adminHome');

    #=======================================================================
    #============================ Admin ====================================
    #=======================================================================
    Route::resource('admins', AdminController::class);
    Route::POST('delete_admin',[AdminController::class,'delete'])->name('delete_admin');
    Route::get('my_profile',[AdminController::class,'myProfile'])->name('myProfile');
    Route::get('logout', [AuthController::class,'logout'])->name('admin.logout');

    #=======================================================================
    #============================ users ====================================
    #=======================================================================
    Route::get('userPerson',[UserController::class,'indexPerson'])->name('userPerson.index');
    Route::get('userCompany',[UserController::class,'indexCompany'])->name('userCompany.index');
    Route::POST('user/delete',[UserController::class,'delete'])->name('user_delete');

    #=======================================================================
    #============================ driver ====================================
    #=======================================================================
    Route::resource('driver',DriverController::class);
    Route::POST('driver/delete',[UserController::class,'delete'])->name('driver_delete');



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
    return response()->json('success',100000000000000);
});









