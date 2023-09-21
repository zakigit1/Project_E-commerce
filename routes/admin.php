<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LanguageController;
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


### Constants ###
const PAGINATION_COUNT=10;



Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware' => 'auth:admin'], function() {
    Route::get('/',[AdminController::class,'admin']) -> name('admin.dashboard');


    ###################### Begin Languages #####################################
    Route::group(['prefix'=>'languages'],function(){
        
        Route::get('/',[LanguageController::class,'index'])->name('admin.all.lang');
        
        Route::get('create',[LanguageController::class,'create'])->name('admin.create.lang');

        Route::post('store',[LanguageController::class,'store'])->name('admin.save.lang');

        Route::get('edit/{id}',[LanguageController::class,'edit'])->name('admin.edit.lang');

        Route::put('update/{id}',[LanguageController::class,'update'])->name('admin.update.lang');
        
        Route::get('delete/{id}',[LanguageController::class,'delete'])->name('admin.delete.lang');
        
    });
    ###################### End Languages #######################################

    ###################### Begin MainCategory ##################################

    Route::group(['prefix'=>''],function(){


        // Route::get()->name();
        // Route::get()->name();
        // Route::get()->name();

    });
    ###################### End MainCategory #####################################


});


Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware' => 'guest:admin'], function(){
     Route::get('login' ,[AdminController::class,'getLogin'])-> name('get.login');
     Route::post('login' ,[AdminController::class,'login']) -> name('admin.login');
});