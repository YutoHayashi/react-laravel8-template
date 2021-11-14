<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group( [
//     'middleware' => [ 'permission', ],
// ], function(  ) {
    Route::get( '/admin/register', [ App\Http\Controllers\Web\UserController::class, 'create' ] )->name( 'admin.create' );
    Route::post( '/admin/save', [ App\Http\Controllers\Web\UserController::class, 'save' ] )->name( 'admin.save' );
// } );
