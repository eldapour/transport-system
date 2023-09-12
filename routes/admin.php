<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\InvoiceSettingController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WarehouseController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

    #============================ Admin ====================================
    Route::resource('admins', AdminController::class);
    Route::POST('delete_admin',[AdminController::class,'delete'])->name('delete_admin');
    Route::get('my_profile',[AdminController::class,'myProfile'])->name('myProfile');
    Route::get('logout', [AuthController::class,'logout'])->name('admin.logout');

    #============================ users ====================================
    Route::get('userPerson',[UserController::class,'indexPerson'])->name('userPerson.index');
    Route::get('userCompany',[UserController::class,'indexCompany'])->name('userCompany.index');
    Route::POST('user/delete',[UserController::class,'delete'])->name('user_delete');
    Route::POST('changeStatus',[UserController::class,'changeStatus'])->name('changeStatus');

    #============================ driver ===================================
    Route::resource('driver',DriverController::class);
    Route::POST('driver/delete',[UserController::class,'delete'])->name('driver_delete');

    #============================ city =====================================
    Route::resource('city',CityController::class);
    Route::POST('city/delete',[CityController::class,'delete'])->name('city_delete');

    #============================ warehouse ================================
    Route::resource('warehouse',WarehouseController::class);
    Route::POST('warehouse/delete',[WarehouseController::class,'delete'])->name('warehouse_delete');

    #============================ warehouse ================================
    Route::get('orderComplete',[OrderController::class,'complete'])->name('orderComplete');
    Route::get('orderNew',[OrderController::class,'new'])->name('orderNew');
    Route::get('orderWaiting',[OrderController::class,'waiting'])->name('orderWaiting');
    Route::get('orderShow/{order}',[OrderController::class,'show'])->name('orderShow');
    Route::get('invoice/{order}',[OrderController::class,'invoice'])->name('invoice');

    #============================ setting ==================================
    Route::get('setting',[SettingController::class,'index'])->name('settingIndex');
    Route::POST('setting/update/{id}',[SettingController::class,'update'])->name('settingUpdate');

    #============================ invoice setting ==================================
    Route::get('invoice-setting',[InvoiceSettingController::class,'index'])->name('invoiceSettingIndex');
    Route::POST('invoice-setting/update/{id}',[InvoiceSettingController::class,'update'])->name('invoiceSettingUpdate');




});




#=======================================================================
#============================ ROOT =====================================
#=======================================================================
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('key:generate');
    Artisan::call('config:clear');
    Artisan::call('optimize:clear');
    return response()->json(['status' => 'success','code' =>1000000000]);
});









