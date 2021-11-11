<?php

namespace App\Http\Resources\Api\Permission;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PermissionResourceCollection extends ResourceCollection {

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request ) {
        return [
            'permissions' => $this->collection->map( function( $permission ) {
                return new PermissionResource( $permission );
            } )->all(  ),
        ];
    }

    public static function create( \Illuminate\Database\Eloquent\Collection $permissions ) {
        return \App\Http\Resources\Api\ResponseBody::create( [
            '_embedded' => new PermissionResourceCollection( $permissions ),
        ] );
    }

}
