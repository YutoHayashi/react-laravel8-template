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

Route::post( 'login', [ App\Http\Controllers\Api\AuthController::class, 'login' ] )->name( 'login' );
Route::get( 'refresh', [ App\Http\Controllers\Api\AuthController::class, 'refresh' ] )->name( 'refresh' );
Route::group( [ 'middleware' => [ 'jwt.auth' ] ], function(  ) {
    Route::post( 'logout', [ App\Http\Controllers\Api\AuthController::class, 'logout' ] )->name( 'logout' );
    Route::get( 'me', [ App\Http\Controllers\Api\AuthController::class, 'me' ] )->name( 'me' );
} );

Route::post( 'register', [ App\Http\Controllers\Api\UserController::class, 'save' ] )->name( 'register' );
