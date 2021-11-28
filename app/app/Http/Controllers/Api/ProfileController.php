<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use \App\Models\Profile;
use \App\Http\Resources\Api\ResponseBody;
use \App\Http\Resources\Api\Profile\ProfileResource;

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
            return ProfileResource::create( $profile );
        } catch( \Exception $e ) {
            return ResponseBody::create( [
                'code' => 400,
                'errors' => [ $e->getMessage(  ), ],
            ] );
        }
    }

}
