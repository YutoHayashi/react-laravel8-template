<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace( '\App\Http\Controllers\Api' )->group( function(  ) {

    Route::post( 'login', 'AuthController@login' )->name( 'login' );
    Route::get( 'refresh', 'AuthController@refresh' )->name( 'refresh' );
    Route::post( 'register', 'UserController@store' )->name( 'register' );
    Route::get( 'verify', 'UserController@verify' )->name( 'verify' );
    Route::post( 'send_password_reset', 'AuthController@sendResettingToken' )->name( 'send_password_reset' );
    Route::post( 'password_reset', 'AuthController@resetPassword' )->name( 'password_reset' );

    // Authentication required
    // Route::group( [
    //     'middleware' => [ 'jwt.auth' ],
    // ], function(  ) {

        Route::post( 'logout', 'AuthController@logout' )->name( 'logout' );
        Route::get( 'me', 'AuthController@me' )->name( 'me' );

        // Permission required
        // Route::group( [
        //     'middleware' => [ 'permission' ],
        // ], function(  ) {

            // Roles / Permissions
            Route::resource( 'roles', 'RoleController' )->only( [ 'index', 'store', 'update', 'destroy', 'show', ] );
            Route::resource( 'permissions', 'PermissionController' )->only( [ 'index', 'show', 'store', ] );
            // Users
            Route::resource( 'users', 'UserController' )->only( [ 'index', 'update', 'destroy', 'show', ] );
            Route::group( [
                'prefix' => 'users',
                'as' => 'users.',
            ], function(  ) {
                Route::post( 'restore/{user}', 'UserController@restore' )->name( 'users.restore' );
            } );
            // Profile
            Route::resource( 'profile', 'ProfileController' )->only( [ 'update' ] );
            Route::group( [
                'prefix' => 'profile',
                'as' => 'profile.',
            ], function(  ) {
                //
            } );

        // } );

    // } );

} );
