<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\Construvias\WorkgroupMainBoxesController;
use App\Http\Controllers\Construvias\SecondaryBoxesController;
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


    Route::get('/organizations/new',             [OrganizationsController::class,'new']);
    Route::get('/organizations',                 [OrganizationsController::class,'index']);
    Route::post('/organizations',                [OrganizationsController::class,'store']);
    Route::patch('/organizations/{id}',          [OrganizationsController::class,'update']);
    Route::delete('/organizations',              [OrganizationsController::class,'delete']);
    Route::post('/organizations/{id}/migrate',   [OrganizationsController::class,'migrate']);



    //Construvias
    Route::get('/workgroups/new',                [WorkgroupMainBoxesController::class,'new']);
    Route::get('/workgroups',                    [WorkgroupMainBoxesController::class,'index']);
    Route::post('/workgroups',                   [WorkgroupMainBoxesController::class,'store']);
    Route::patch('/workgroups/{id}',             [WorkgroupMainBoxesController::class,'update']);
    Route::delete('/workgroups',                 [WorkgroupMainBoxesController::class,'delete']);

    Route::get('/boxes/new',                     [SecondaryBoxesController::class,'new']);
    Route::get('/boxes',                         [SecondaryBoxesController::class,'index']);
    Route::post('/boxes',                        [SecondaryBoxesController::class,'store']);
    Route::patch('/boxes/{id}',                  [SecondaryBoxesController::class,'update']);
    Route::delete('/boxes',                      [SecondaryBoxesController::class,'delete']);
});