<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\cicle::class, 20)->create();
        factory(\App\article::class, 20)->create();
        factory(\App\offer::class, 20)->create();
        factory(\App\requirement::class, 20)->create();
        factory(\App\applied::class, 20)->create();
    }
}
