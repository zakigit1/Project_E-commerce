<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/


// Route::group([
//     'namespace'=>'Admin',
//     // 'middleware'=>'',
//     'prefix'=>'admin',
//     ],
//     function (){

//         Route::get('', [AdminController::class,'admin'])->middleware('auth:admin')->name('admin.dashboard');
//         Route::get('login',[AdminController::class,'getLogin'])->name("get.login");
//         Route::post('check',[AdminController::class,'login'])->name("admin.login");
//     }
// );






Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware' => 'auth:admin'], function() {
    Route::get('/',[AdminController::class,'admin']) -> name('admin.dashboard');
});



Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware' => 'guest:admin'], function(){
     Route::get('login' ,[AdminController::class,'getLogin'])-> name('get.login');
     Route::post('login' ,[AdminController::class,'login']) -> name('admin.login');
});