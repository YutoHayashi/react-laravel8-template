<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return parent::toArray( $request );
    }

    public static function create( $request ) {
        return ResponseBody::create( [
            '_embedded' => new UserResource( $request ),
        ] );
    }
}
