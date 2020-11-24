<?php

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
	    // $this->call([
	    //     UsersTableSeeder::class,
	    //     // PostsTableSeeder::class,
	    //     // CommentsTableSeeder::class,
	    // ]);
	    
        // factory(\App\User::class, 55)->create();
        factory(\App\Models\Post::class, 100)->create();
    }
}
