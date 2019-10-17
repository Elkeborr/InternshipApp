<?php

use Illuminate\Database\Seeder;

class InternshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // $internship = new \App\Internship();
        // $internship->company_name = 'Cronos';
        // $internship->company_city = 'Antwerpen';
        // $internship->internship_function = 'Back End Developer';
        // $internship->internship_discription = 'Lorem ipsum';
        // $internship->available_spots = '2';
        // $internship->save();

        factory(\App\Internship::class, 50)->create();
    }
}
