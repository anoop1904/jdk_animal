<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'App\Http\Controllers\AuthController@getUser');
    // Route::get('closed', 'DataController@closed');
});

Route::post('verifyMobileOtp', 'App\Http\Controllers\ApiController@otpVerification');
Route::post('phoneNumberVerification', 'App\Http\Controllers\ApiController@phoneNumberVerification');