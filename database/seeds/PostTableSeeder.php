<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 30)->create()->each(function ($post){

         	$post->tags()->attach($this->array(rand(1,12)));

        });

    }
    
    public function array ($max)
    {
        $values = [];

        for ($i=1; $i < $max; $i++) { 
            	$values[] = $i;
        }
       	return $values;
    }
    
}
