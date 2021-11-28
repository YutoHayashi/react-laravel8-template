<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreateSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(  ) {
        \Illuminate\Support\Facades\DB::transaction( function(  ) {
            $root = \App\Models\User::createSuper( [
                'email' => 'root@lvh.me',
                'password' => 'password',
            ] );
            $root_role = \App\Models\Role::where( [ 'name' => 'root', ] )->first(  );
            $root->assignRole( [ $root_role->id ] );
        } );
    }
}
