<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreateRootUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(  ) {
        \Illuminate\Support\Facades\DB::transaction( function(  ) {
            $user = \App\Models\User::createRoot( [
                'name' => 'root',
                'email' => 'root@lvh.me',
                'password' => 'password',
            ] );
            $role = \Spatie\Permission\Models\Role::create( [ 'name' => 'root', ] );
            $permissions = \Spatie\Permission\Models\Permission::pluck( 'id' )->all(  );
            $role->syncPermissions( $permissions );
            $user->assignRole( [ $role->id ] );
        } );
    }
}
