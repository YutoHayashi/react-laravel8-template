<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(  )
    {
        Schema::create( 'users', function ( Blueprint $table ) {
            $table->id(  );
            $table->string( 'name' )->comment( 'ユーザー名' );
            $table->string( 'email' )->unique(  )->comment( 'ユーザーメールアドレス' );
            $table->boolean( 'is_admin' )->default( false )->comment( '管理者フラグ' );
            $table->boolean( 'is_active' )->default( true )->comment( '論理フラグ' );
            $table->timestamp( 'email_verified_at' )->nullable(  )->comment( '本人確認年月日' );
            $table->string( 'password' )->comment( 'パスワード' );
            $table->rememberToken(  );
            $table->timestamps(  );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(  )
    {
        Schema::dropIfExists( 'users' );
    }
}
