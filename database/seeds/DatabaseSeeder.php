<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	//calls all the seeders
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
    }
}
