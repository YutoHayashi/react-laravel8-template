<?php

namespace App\Http\Resources\Api\Permission;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request ) {
        return parent::toArray( $request );
    }

    public static function create( \App\Models\Permission $permission ) {
        return \App\Http\Resources\Api\ResponseBody::create( [
            '_embedded' => [
                'permission' => new PermissionResource( $permission ),
            ],
        ] );
    }

}
