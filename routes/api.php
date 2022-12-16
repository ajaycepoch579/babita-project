<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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

//Route::post('/student','ApiController@create');
Route::get('student', [ApiController::class,'index']);
Route::get('student-show/{id}', [ApiController::class,'show']);
Route::post('student-store', [ApiController::class,'store']);
Route::post('student-update/{id}', [ApiController::class,'update']);
Route::delete('student-delete/{id}', [ApiController::class,'delete']);
Route::post('student-add-address', [ApiController::class,'add_address']);
Route::post('student-update-address/{id}', [ApiController::class,'updateAddress']);