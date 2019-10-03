<?php

//model voor students
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //zonder factory
        //$student = new \App\Student();
        //opvullen met tabellen in de databank
        //$student->name = 'Angelique';
        //$student->bio = 'hallo';
        //student opslaan, erft over van model Student.php
        //$student->save();

        //met factory = automatisch neppe students maken
        //methode wordt 50x herhaald = 50 students gemaakt
        factory(\App\Student::class, 50)->create();
    }
}
