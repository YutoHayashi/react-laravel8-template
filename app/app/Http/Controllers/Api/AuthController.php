<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Http\Resources\Api\ResponseBody;
use \App\Http\Resources\Api\Auth\TokenResource;
use \App\Http\Resources\Api\Auth\UserResource;
use \Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller {

    /**
     * Get a JWT via given credentials.
     * @param \App\Http\Requests\Api\Auth\LoginRequest $request - Validated request object
     * @return Response
     */
    public function login( \App\Http\Requests\Api\Auth\LoginRequest $request ) {
        $credentials = request( [ 'email', 'password', ] );
        try {
            if ( ! $token = auth(  )->attempt( $credentials ) ) {
                return ResponseBody::create( [
                    'code' => 401,
                    'errors' => [ 'Unauthorized.', ],
                ] );
            }
        } catch( JWTException $e ) {
            return ResponseBody::create( [
                'code' => 500,
                'errors' => [ 'Could not create token.' ],
            ] );
        }
        return TokenResource::create( [
            'token' => $token,
        ] );
    }

    /**
     * Get the authenticated User.
     * @return Response
     */
    public function me(  ) {
        return UserResource::create( auth(  )->user(  ) );
    }

    /**
     * Refresh a token
     * @return Response
     */
    public function refresh(  ) {
        try {
            return TokenResource::create( [
                'token' => auth(  )->refresh(  ),
            ] );
        } catch( JWTException $e ) {
            return ResponseBody::create( [
                'code' => 401,
                'errors' => [ 'Unauthorized.', ],
            ] );
        }
    }

    /**
     * Log the user out (Invalidate the token)
     * @return Response
     */
    public function logout(  ) {
        try {
            auth(  )->logout(  );
            return ResponseBody::create( [
                'messages' => [ 'Successfully logged out.' ],
            ] );
        } catch( \Exception $e ) {
            return ResponseBody::create( [
                'code' => 400,
                'errors' => [ $e->getMessage(  ), ],
            ] );
        }
    }

}
