<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SignageController;

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
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    });

    Route::group(['prefix' => 'v1'],function(){
    Route::get('/get_list',[SignageController::class,'get_list']);
    Route::get('/get_schedule',[SignageController::class,'get_schedule']);
});