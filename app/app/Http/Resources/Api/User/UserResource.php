<?php

namespace App\Http\Resources\Api\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request ) {
        return array_merge( parent::toArray( $request ), [
            'profile' => $this->resource->profile,
        ] );
    }

    public static function create( \App\Models\User $user ) {
        return \App\Http\Resources\Api\ResponseBody::create( [
            '_embedded' => [
                'user' => new UserResource( $user ),
            ],
        ] );
    }

}
