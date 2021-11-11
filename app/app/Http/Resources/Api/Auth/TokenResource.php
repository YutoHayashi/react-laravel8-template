<?php

namespace App\Http\Resources\Api\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return [
            'token' => $this->resource[ 'token' ] ?? '',
            'type' => 'Bearer',
            'expires_in' => ( auth(  )->factory(  )->getTTL(  ) * 60 ),
        ];
    }

    public static function create( $request ) {
        return \App\Http\Resources\Api\ResponseBody::create( [
            '_embedded' => new TokenResource( $request ),
        ] );
    }
}
