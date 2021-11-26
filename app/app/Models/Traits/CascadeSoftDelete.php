<?php

namespace App\Models\Traits;

trait CascadeSoftDelete {

    protected static function bootCascadeSoftDeletes(  ) {
        static::deleting( function( $model ) {
            foreach( array_filter( ( isset( $model->cascadeDeletes ) ? (array) $model->cascadeDeletes : [  ] ), function( $relationship ) use ( $model ) {
                return ! is_null( $model->{ $relationship } );
            } ) as $relationship ) {
                foreach( $model->{ $relationship }(  )->get(  ) as $model ) {
                    $model->pivot ? $model->pivot->delete(  ) : $model->delete(  );
                }
            };
        } );
    }

}
