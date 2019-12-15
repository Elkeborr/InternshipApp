<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(CompanyTagsSeeder::class);
        $this->call(AssignCompanySeeder::class);
        $this->call(InternshipSeeder::class);
        $this->call(ReviewsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(StateSeeder::class);
    }
}
