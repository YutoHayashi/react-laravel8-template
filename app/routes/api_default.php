<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace( '\App\Http\Controllers\Api' )->group( function(  ) {


    Route::post( 'login', 'AuthController@login' )->name( 'login' );
    Route::get( 'refresh', 'AuthController@refresh' )->name( 'refresh' );
    Route::post( 'register', 'UserController@store' )->name( 'register' );
    Route::group( [
        'middleware' => [ 'jwt.auth' ],
    ], function(  ) {
        Route::post( 'logout', 'AuthController@logout' )->name( 'logout' );
        Route::get( 'me', 'AuthController@me' )->name( 'me' );
        // Route::group( [
        //     'middleware' => [ 'permission' ],
        // ], function(  ) {
            Route::resource( 'roles', 'RoleController' )->only( [ 'index', 'store', 'update', 'destroy', ] );
            Route::resource( 'permissions', 'PermissionController' )->only( [ 'index', 'store', 'update', 'destroy', ] );
            Route::resource( 'users', 'UserController' )->only( [ 'index', 'update', 'destroy', ] );
        // } );
    } );


} );