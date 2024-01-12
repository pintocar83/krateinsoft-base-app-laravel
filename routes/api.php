<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Construvias\WorkgroupMainBoxesController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/users/valid',                      [UserController::class, 'valid']);

Route::group(['middleware' => ['initialization', 'auth']], function() {
    Route::get('/users',                         [UserController::class,'index']);
    Route::post('/users',                        [UserController::class,'store']);
    Route::patch('/users/{id}',                  [UserController::class,'update']);
    Route::patch('/users/{id}/permissions',      [UserController::class,'update_permissions']);
    //Route::delete('/users/{id}',                 [UserController::class,'destroy']);
    Route::delete('/users',                      [UserController::class,'delete']);






    //Construvias
    Route::get('/workgroups',                    [WorkgroupMainBoxesController::class,'index']);
});