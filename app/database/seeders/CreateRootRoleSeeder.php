<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreateRootRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(  ) {
        \Spatie\Permission\Models\Role::create( [
            'name' => 'root',
        ] );
    }
}
