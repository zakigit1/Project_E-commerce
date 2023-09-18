<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register site routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the  site" middleware group. Make something great!
|
*/

Route::get('/store', function () {
    return view('front.home');
});
