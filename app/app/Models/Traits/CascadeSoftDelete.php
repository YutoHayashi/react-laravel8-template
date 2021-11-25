<?php

namespace App\Models\Traits;

trait CascadeSoftDelete {

    protected function bootCascadeSoftDeletes(  ) {
        static::deleting( function( $model ) {
            foreach( array_filter( ( isset( $this->cascadeDeletes ) ? (array) $this->cascadeDeletes : [  ] ), function( $relationship ) {
                return ! is_null( $this->{ $relationship } );
            } ) as $relationship ) {
                foreach( $this->{ $relationship }(  )->get(  ) as $model ) {
                    $model->pivot ? $model->pivot->delete(  ) : $model->delete(  );
                }
            };
        } );
    }

}
