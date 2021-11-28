<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(  ) {
        Schema::create( 'profiles', function ( Blueprint $table ) {
            $table->id(  );
            $table->foreignIdFor( \App\Models\User::class, 'user_id' )
                ->constrained(  )
                ->cascadeOnUpdate(  )
                ->cascadeOnDelete(  );
            $table->string( 'name' )->nullable(  )->default( null )->comment( 'ユーザー名' );
            $table->softDeletes(  );
            $table->timestamps(  );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(  ) {
        Schema::dropIfExists( 'profiles' );
    }
}
