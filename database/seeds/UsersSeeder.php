<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'Wesley';
        $user->email = 'weske@company.com';
        $user->password = bcrypt('password');
        $user->type = 'company';
        $user->company_id = '1';
        $user->save();

        $user2 = new \App\User();
        $user2->name = 'Elke';
        $user2->email = 'elke@student.com';
        $user2->password = bcrypt('password');
        $user2->type = 'student';
        $user2->save();

        $user3 = new \App\User();
        $user3->name = 'Robin';
        $user3->email = 'robin@company.com';
        $user3->password = bcrypt('password');
        $user3->type = 'company';
        $user3->company_id = '2';
        $user3->save();

        $user4 = new \App\User();
        $user4->name = 'Angelique';
        $user4->email = 'angelique@student.com';
        $user4->password = bcrypt('password');
        $user4->type = 'student';
        $user4->save();
    }
}
