<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummpApi;
use App\Http\Controllers\deviceController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get("data",[dummpApi::class,'getdata']); 
Route::get("list/",[deviceController::class,'list']);
Route::get('list_id/{id}',[deviceController::class,'list_id']);
Route::post('add',[deviceController::class,'add']);
Route::put('update',[deviceController::class,'update']);
Route::get('search/{name}',[deviceController::class,'search']);