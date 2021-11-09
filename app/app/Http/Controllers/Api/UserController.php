<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;
use \App\Http\Resources\Api\ResponseBody;
use \App\Http\Resources\Api\UserResource;

class UserController extends Controller {

    /**
     * 
     */
    public function save( \App\Http\Requests\Api\Auth\RegisterRequest $request ) {
        $credentials = request( [ 'name', 'email', 'password' ] );
        $credentials[ 'password' ] = Hash::make( $credentials[ 'password' ] );
        try {
            return UserResource::create( [
                'user' => User::create( $credentials ),
            ] );
        } catch ( \Exception $e ) {
            return ResponseBody::create( [
                'code' => 400,
                'errors' => [ $e->getMessage(  ), ],
            ] );
        }
    }

}
