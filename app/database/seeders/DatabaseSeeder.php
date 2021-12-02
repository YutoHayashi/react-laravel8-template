<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(  ) {
        $this->call( CreateSuperRoleSeeder::class );
        $this->call( CreateAdminRoleSeeder::class );
        $this->call( CreateSuperUserSeeder::class );
        $this->call( CreateAdminUserSeeder::class );
    }
}
