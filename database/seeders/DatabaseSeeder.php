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
    public function run()
    {
        $this->call(UserDataSeeder::class);
        $this->call(BlogDataSeeder::class);
        $this->call(ReviewDataSeeder::class);
    }
}
