<?php

namespace App\Observers;

use \App\Models\User;
use \App\Models\Profile;

class UserObserver {

    public function created( User $user ) {
        Profile::create( $user );
        $user->notify( new \App\Notifications\UserRegistered );
    }

    public function updated( User $user ) {
        //
    }

    public function deleted( User $user ) {
        Profile::find( "$user" )->delete(  );
    }

    public function restored( User $user ) {
        Profile::onlyTrashed(  )->find( "$user" )->restore(  );
    }

    public function forceDeleted( User $user ) {
        Profile::withTrashed(  )->find( "$user" )->forceDeleted(  );
    }

}
