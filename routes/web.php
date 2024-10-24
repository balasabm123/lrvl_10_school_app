<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\userController;
use App\Http\Controllers\catagoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/',[HomeController::class,'home']);


 
Route::get('/',[HomeController::class,'home']);

Route::get('login',[AuthController::class,'login']);
Route::post('login', [AuthController::class,'auth_ligin']);


Route::get('register',[AuthController::class,'register']);
Route::post('register',[AuthController::class,'user_register']);

Route::get('forgot-password',[AuthController::class,'forgot']);

Route::post('forgot-password',[AuthController::class,'forgot_password']);

Route::get('reset/{id}', [AuthController::class,'reset']);
Route::post('reset/{id}', [AuthController::class,'reset']);

Route::group(['middleware'=>'adminuser'],function (){

    Route::get('dasboard',[Dashboardcontroller::class,'dasboard']);
    Route::get('user_list',[userController::class,'user']); 
    Route::get('add_user',[userController::class,'add_user']);
    Route::post('insert_user',[userController::class,'insert_user']);
    Route::get('edit_user/{id}',[userController::class,'edit_user']);
    Route::post('update_user/{id}',[userController::class,'update_user']);
    Route::get('delete_user/{id}',[userController::class,'delete_user']);

    Route::get('catagory/list',[catagoryController::class,'list']);


});

Route::get('logout',[AuthController::class,'logout']);