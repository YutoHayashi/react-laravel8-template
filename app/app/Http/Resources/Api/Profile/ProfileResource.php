<?php

namespace App\Http\Resources\Api\Profile;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request ) {
        return parent::toArray( $request );
    }

    public static function create( \App\Models\Profile $profile ) {
        return \App\Http\Resources\Api\ResponseBody::create( [
            '_embedded' => [
                'profile' => new ProfileResource( $profile )
            ]
        ] );
    }

}
