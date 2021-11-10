<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request ) {
        return [
            'users' => $this->collection->map( function( $user ) {
                return new UserResource( $user );
            } )->all(  ),
        ];
    }

    public static function create( Collection $users ) {
        return ResponseBody::create( [
            '_embedded' => new UserResourceCollection( $users ),
        ] );
    }
}
