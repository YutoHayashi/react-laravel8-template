<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(  ) {
        \Illuminate\Support\Facades\DB::transaction( function(  ) {
            $administrator = \App\Models\User::createAdmin( [
                'email' => 'administrator@lvh.me',
                'password' => 'password',
            ] );
            $admin_role = \App\Models\Role::where( [ 'name' => 'administrator' ] )->first(  );
            $administrator->assignRole( [ $admin_role->id ] );
        } );
    }
}
