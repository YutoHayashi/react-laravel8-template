<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use \App\Models\Profile;

class ProfileController extends Controller {

    /**
     * Update profile
     * @param Profile $profile
     * @param \App\Http\Requests\Api\Profile\UpdateRequest $request
     * @return JsonResponse 
     */
    public function update( \App\Http\Requests\Api\Profile\UpdateRequest $request, Profile $profile ) {
        try {
            $profile->update( $request->validated(  ) );
            return $this->profileResponse( $profile );
        } catch( \Throwable $e ) {
            return $this->errorResponse( [ $e->getMessage(  ), ], 400 );
        }
    }

}
