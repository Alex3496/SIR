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

        factory(App\Category::class, 5)->create();
        factory(App\Tag::class,12)->create();

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TariffsTableSeeder::class);
        $this->call(PostTableSeeder::class);
    }
}
