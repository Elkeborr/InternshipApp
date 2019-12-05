<?php

use Illuminate\Database\Seeder;

class CompanyTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tag = new \App\CompanyTag();
        $tag->name = '3D';
        $tag->save();
        $tag2 = new \App\CompanyTag();
        $tag2->name = 'Copywriting / Content Production';
        $tag2->save();
        $tag3 = new \App\CompanyTag();
        $tag3->name = 'Digital Design';
        $tag3->save();
        $tag4 = new \App\CompanyTag();
        $tag4->name = 'Front-end Development';
        $tag4->save();
        $tag5 = new \App\CompanyTag();
        $tag5->name = 'Graphic Design';
        $tag5->save();
        $tag6 = new \App\CompanyTag();
        $tag6->name = 'PHP Development';
        $tag6->save();
        $tag7 = new \App\CompanyTag();
        $tag7->name = 'UX Design';
        $tag7->save();
        $tag8 = new \App\CompanyTag();
        $tag8->name = 'UI Design';
        $tag8->save();
        $tag9 = new \App\CompanyTag();
        $tag9->name = 'Web Development';
        $tag9->save();
        $tag10 = new \App\CompanyTag();
        $tag10->name = 'Full Stack Development';
        $tag10->save();
        $tag11 = new \App\CompanyTag();
        $tag11->name = 'Motion Design';
        $tag11->save();
        $tag12 = new \App\CompanyTag();
        $tag12->name = 'Mobile Development';
        $tag12->save();
        $tag13 = new \App\CompanyTag();
        $tag13->name = 'Virtual Reality / Gaming';
        $tag13->save();
    }
}
