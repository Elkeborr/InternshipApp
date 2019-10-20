<?php

use Illuminate\Database\Seeder;

class InternshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
<<<<<<< HEAD
        // $internship = new \App\Internship();
        // $internship->company_id = '1';
        // $internship->internship_function = 'Back End Developer';
        // $internship->internship_discription = 'Lorem ipsum';
        // $internship->available_spots = '2';
        // $internship->save();
=======
        $internship = new \App\Internship();
        $internship->company_name = 'Cronos';
        $internship->company_city = 'Antwerpen';
        $internship->internship_function = 'Back End Developer';
        $internship->internship_discription = 'Lorem ipsum';
        $internship->available_spots = '2';
        $internship->save();
>>>>>>> bb09a6cffab9a73db2a0a532dd6acdea85133d97

        // factory(\App\Internship::class, 50)->create();
    }
}
