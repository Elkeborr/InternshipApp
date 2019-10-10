<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(ReviewsSeeder::class);
        // $this->call(InternshipsSeeder::class);
    }
}
