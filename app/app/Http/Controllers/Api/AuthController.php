<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use \App\Models\User;
use \Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller {

    /**
     * Get a JWT via given credentials.
     * @param \App\Http\Requests\Api\Auth\LoginRequest $request - Validated request object
     * @return JsonResponse
     */
    public function login( \App\Http\Requests\Api\Auth\LoginRequest $request ) {
        try {
            if ( ! $token = auth(  )->attempt( $request->validated(  ) ) ) {
                return $this->errorResponse( [ 'Unauthorized.', ], 401 );
            }
        } catch( JWTException $e ) {
            return $this->errorResponse( [ 'Could not create token.' ], 500 );
        }
        return $this->authTokenResponse( $token );
    }

    /**
     * Get the authenticated User.
     * @return JsonResponse
     */
    public function me(  ) {
        $this->userResponse( auth(  )->user(  ) );
    }

    /**
     * Refresh a token
     * @return JsonResponse
     */
    public function refresh(  ) {
        try {
            return $this->authTokenResponse( auth(  )->refresh(  ) );
        } catch( JWTException $e ) {
            return $this->errorResponse( [ 'Unauthorized.', ], 401 );
        }
    }

    /**
     * Log the user out (Invalidate the token)
     * @return JsonResponse
     */
    public function logout(  ) {
        try {
            auth(  )->logout(  );
            return $this->successResponse(  );
        } catch( \Throwable $e ) {
            return $this->errorResponse( [ $e->getMessage(  ), ], 400 );
        }
    }

    /**
     * Send password reset email
     * @param \App\Http\Requests\Api\Auth\SendResettingToken $request
     * @return JsonResponse 
     */
    public function sendResettingToken( \App\Http\Requests\Api\Auth\SendResettingToken $request ) {
        try {
            $user = User::where( 'email', $request->validated(  )[ 'email' ] )->firstOrFail(  );
            $user->notify( new \App\Notifications\ResetPasswordToken( \App\Models\PasswordReset::create( $user ) ) );
            return $this->successResponse(  );
        } catch( \Throwable $e ) {
            return $this->errorResponse( [ $e->getMessage(  ), ], 400 );
        }
    }

    /**
     * Reset password
     * @param \App\Http\Requests\Api\Auth\ResetPassword $request 
     * @return JsonResponse 
     */
    public function resetPassword( \App\Http\Requests\Api\Auth\ResetPassword $request ) {
        $payload = $request->validated(  );
        $password = $payload[ 'password' ];
        $token = $payload[ 'token' ];
        try {
            $password_reset = \App\Models\PasswordReset::where( 'token', $token )->firstOrFail(  );
            \Illuminate\Support\Facades\DB::transaction( function (  ) use ( $password_reset, $password ) {
                if ( $password_reset->user->update( compact( 'password' ) ) ) {
                    $password_reset->user->notify( new \App\Notifications\PasswordReset );
                    $password_reset->delete(  );
                }
            } );
            return $this->successResponse(  );
        } catch( \Throwable $e ) {
            return $this->errorResponse( [ $e->getMessage(  ), ], 400 );
        }
    }

}
