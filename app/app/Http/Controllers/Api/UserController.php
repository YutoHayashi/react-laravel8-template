<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use \App\Models\User;

class UserController extends Controller {

    /**
     * Index user
     * @return JsonResponse  
     */
    public function index(  ) {
        try {
            return $this->usersResponse( User::take( 10 )->get(  ) );
        } catch( \Exception $e ) {
            return $this->errorResponse( [ $e->getMessage(  ) ], 400 );
        }
    }

    /**
     * Store user
     * @param \App\Http\Requests\Api\Auth\StoreRequest $request - Validated request object.
     * @return JsonResponse 
     */
    public function store( \App\Http\Requests\Api\User\StoreRequest $request ) {
        $payload = $request->validated(  );
        try {
            return $this->userResponse( User::createBase( $payload ) );
        } catch ( \Throwable $e ) {
            return $this->errorResponse( [ $e->getMessage(  ), ], 400 );
        }
    }

    /**
     * Update user
     * @param User $user - User object.
     * @param \App\Http\Requests\Api\Auth\UpdateRequest $request - Validated request object.
     * @return JsonResponse 
     */
    public function update( User $user, \App\Http\Requests\Api\User\UpdateRequest $request ) {
        $payload = $request->validated(  );
        try {
            $user->update( $payload );
            return $this->userResponse( $user );
        } catch( \Throwable $e ) {
            return $this->errorResponse( [ $e->getMessage(  ), ], 400 );
        }
    }

    /**
     * Destroy user.
     * @param User $user - User object.
     * @return JsonResponse 
     */
    public function destroy( User $user ) {
        try {
            $user->delete(  );
            return $this->successResponse(  );
        } catch( \Throwable $e ) {
            return $this->errorResponse( [ $e->getMessage(  ), ], 400 );
        }
    }

    /**
     * Retrieve user
     * @param User $user - User model
     * @return JsonResponse 
     */
    public function show( User $user ) {
        return $this->userResponse( $user );
    }

    /**
     * Restore use data
     * @param User $user
     * @return JsonResponse 
     */
    public function restore( User $user ) {
        try {
            $user->restore(  );
            return $this->userResponse( $user );
        } catch( \Throwable $e ) {
            return $this->errorResponse( [ $e->getMessage(  ), ], 400 );
        }
    }

    /**
     * Verify user email
     * @param Request $request 
     * @return JsonResponse 
     */
    public function verify( Request $request ) {
        if (
            User::where( 'email_verification_token', $request->get( 'email_verification_token' ) )
                ->firstOrFail(  )
                ->update( [
                    'email_verified_at' => \Carbon\Carbon::now(  ),
                ] )
        ) {
            return $this->successResponse(  );
        } else {
            return $this->errorResponse( [  ], 400 );
        }
    }

}
