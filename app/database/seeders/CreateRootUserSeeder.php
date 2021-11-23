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
            $root = \App\Models\User::createRoot( [
                'name' => 'root',
                'email' => 'root@lvh.me',
                'password' => 'password',
            ] );
            $root_role = \Spatie\Permission\Models\Role::where( [ 'name' => 'root', ] )->first(  );
            $root->assignRole( [ $root_role->id ] );
        } );
    }
}
