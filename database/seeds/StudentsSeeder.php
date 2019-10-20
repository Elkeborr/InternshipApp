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
        $student = new \App\Student();
        $student->name = 'Angelique';
        $student->lastname = 'Buijzen';
        $student->bio = 'Hallo ik ben Angelique';
        $student->email = 'angelique@student.be';
        $student->password = bcrypt('ditIsEenWachtwoord');
        $student->type = 'student';
        //student opslaan, erft over van model Student.php
        $student->save();

        $student2 = new \App\Student();
        $student2->name = 'Elke';
        $student2->lastname = 'Borreij';
        $student2->bio = 'Hallo ik ben Elke!';
        $student2->email = 'elkee@student.be';
        $student2->password = bcrypt('ditIsEenWachtwoord');
        $student2->type = 'student';
        $student2->save();

        $student3 = new \App\Student();
        $student3->name = 'Robin';
        $student3->lastname = 'Van Buggenhout';
        $student3->bio = 'Hallo ik ben Robin';
        $student3->email = 'robin@student.be';
        $student3->password = bcrypt('ditIsEenWachtwoord');
        $student3->type = 'student';
        $student3->save();

        $student4 = new \App\Student();
        $student4->name = 'Wesley';
        $student4->lastname = 'Wke';
        $student4->bio = 'Hallo ik ben Wesley';
        $student4->email = 'wesley@student.be';
        $student4->password = bcrypt('ditIsEenWachtwoord');
        $student4->type = 'student';
        $student4->save();

        //met factory = automatisch neppe students maken
        //methode wordt 50x herhaald = 50 students gemaakt
        //factory(\App\Student::class, 50)->create();
    }
}
