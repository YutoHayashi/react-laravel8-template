<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ResponseBody extends JsonResource
{

    public $code;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request ) {
        $code = $this->resource[ 'code' ] ?? 200; // "??" <- null合体演算子っていうらしい
        $errors = $this->resource[ 'errors' ] ?? [  ];
        $messages = $this->resource[ 'messages' ] ?? [  ];
        $this->code = $code;
        return [
            'code' => $code,
            'errors' => $errors,
            'messages' => $messages,
            '_embedded' => $this->resource[ '_embedded' ] ?? [  ],
        ];
    }

}
