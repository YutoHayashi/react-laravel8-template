<?php

namespace App\Models\Traits;

trait UseUuidForPK {

    public static function boot(  ) {
        parent::boot(  );
        static::creating( function( $model ) {
            $model->{ $model->getKeyName(  ) } = \Illuminate\Support\Str::uuid(  )->toString(  );
        } );
    }

    public function getIncrementing(  ) {
        return false;
    }

    public function getKeyType(  ) {
        return 'string';
    }

}
