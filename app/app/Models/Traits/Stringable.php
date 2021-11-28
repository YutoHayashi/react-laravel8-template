<?php

namespace App\Models\Traits;

trait Stringable {

    public function __toString(  ) {
        return strval( $this->{ $this->getKeyName(  ) } );
    }

}
