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
            $admin = \App\Models\User::createAdmin( [
                'email' => 'admin@lvh.me',
                'password' => 'password',
            ] );
            $admin_role = \App\Models\Role::where( [ 'name' => 'admin' ] )->first(  );
            $admin->assignRole( [ $admin_role->id ] );
        } );
    }
}
