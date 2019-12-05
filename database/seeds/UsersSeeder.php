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
        $user->lastname = 'Wijsen';
        $user->email = 'weske@company.com';
        $user->password = bcrypt('password');
        $user->type = 'company';
        $user->company_id = '1';
        $user->save();
        $user2 = new \App\User();
        $user2->name = 'Elke';
        $user2->lastname = 'Borreij';
        $user2->email = 'elke@student.com';
        $user2->password = bcrypt('password');
        $user2->type = 'student';
        $user2->save();
        $user3 = new \App\User();
        $user3->name = 'Robin';
        $user3->lastname = 'Van Buggenhout';
        $user3->email = 'robin@company.com';
        $user3->password = bcrypt('password');
        $user3->type = 'company';
        $user3->company_id = '2';
        $user3->save();
        $user4 = new \App\User();
        $user4->name = 'Angelique';
        $user4->lastname = 'Buijzen';
        $user4->email = 'angelique@student.com';
        $user4->password = bcrypt('password');
        $user4->type = 'student';
        $user4->save();
        $user5 = new \App\User();
        $user5->name = 'Antwerp Factory';
        $user5->email = 'info@antwerpfactory.com';
        $user5->password = bcrypt('antwerpfactory');
        $user5->type = 'company';
        $user5->company_id = 1;
        $user5->save();
        $user6 = new \App\User();
        $user6->name = 'Foreach';
        $user6->email = 'info@foreach.be';
        $user6->password = bcrypt('foreach1');
        $user6->type = 'company';
        $user6->company_id = 2;
        $user6->save();
        $user7 = new \App\User();
        $user7->name = 'Duval Branding';
        $user7->email = 'hello@duvalbranding.com';
        $user7->password = bcrypt('duvalbranding');
        $user7->type = 'company';
        $user7->company_id = 3;
        $user7->save();
        $user8 = new \App\User();
        $user8->name = 'Marbles';
        $user8->email = 'hello@marbles.com';
        $user8->password = bcrypt('marbles1');
        $user8->type = 'company';
        $user8->company_id = 4;
        $user8->save();
        $user9 = new \App\User();
        $user9->name = 'Dive';
        $user9->email = 'info@dive.be';
        $user9->password = bcrypt('dive1234');
        $user9->type = 'company';
        $user9->company_id = 5;
        $user9->save();
    }
}
