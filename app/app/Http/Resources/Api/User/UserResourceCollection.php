<?php

namespace App\Http\Resources\Api\User;

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
        return $this->collection->map( function( $user ) {
            return new UserResource( $user->resource );
        } )->all(  );
    }

    public static function create( \Illuminate\Database\Eloquent\Collection $users ) {
        return \App\Http\Resources\Api\ResponseBody::create( [
            '_embedded' => [
                'users' => new UserResourceCollection( $users ),
            ],
        ] );
    }

}
