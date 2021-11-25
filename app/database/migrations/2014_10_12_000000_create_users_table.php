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
    public function up(  ) {
        Schema::create( 'users', function ( Blueprint $table ) {
            $table->uuid( 'id' )->primary(  )->unique(  );
            $table->string( 'name' )->comment( 'ユーザー名' );
            $table->string( 'email' )->unique(  )->comment( 'ユーザーメールアドレス' );
            $table->boolean( 'is_root' )->default( false )->comment( 'スーパーユーザーフラグ' );
            $table->uuid( 'email_verification_token' )->comment( 'メールアドレス検証用トークン' );
            $table->timestamp( 'email_verified_at' )->nullable(  )->comment( '本人確認年月日' );
            $table->string( 'password' )->comment( 'パスワード' );
            $table->softDeletes(  );
            $table->rememberToken(  );
            $table->timestamps(  );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(  ) {
        Schema::dropIfExists( 'users' );
    }
}
