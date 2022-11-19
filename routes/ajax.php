<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\LoginController ;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\library\libraryController;
use App\Http\Controllers\Teachers\quezzController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth ;
/*
|--------------------------------------------------------------------------
| ajax Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth:Teacher,web'],function(){
    Route::get('/Get_classrooms/{id}', [ajaxController::class , 'getClassrooms']);
    Route::get('/Get_Sections/{id}', [ajaxController::class , 'Get_Sections'] );

});
