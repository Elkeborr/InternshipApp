<?php

use Illuminate\Database\Seeder;

class AssignCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tag = new \App\AssignCompanyTags();
        $tag->company_id = 1;
        $tag->company_tag_id = 7;
        $tag->save();

        $tag2 = new \App\AssignCompanyTags();
        $tag2->company_id = 1;
        $tag2->company_tag_id = 8;
        $tag2->save();

        $tag3 = new \App\AssignCompanyTags();
        $tag3->company_id = 1;
        $tag3->company_tag_id = 3;
        $tag3->save();

        $tag4 = new \App\AssignCompanyTags();
        $tag4->company_id = 1;
        $tag4->company_tag_id = 4;
        $tag4->save();

        $tag5 = new \App\AssignCompanyTags();
        $tag5->company_id = 2;
        $tag5->company_tag_id = 4;
        $tag5->save();

        $tag6 = new \App\AssignCompanyTags();
        $tag6->company_id = 2;
        $tag6->company_tag_id = 10;
        $tag6->save();

        $tag7 = new \App\AssignCompanyTags();
        $tag7->company_id = 2;
        $tag7->company_tag_id = 9;
        $tag7->save();

        $tag8 = new \App\AssignCompanyTags();
        $tag8->company_id = 2;
        $tag8->company_tag_id = 12;
        $tag8->save();

        $tag9 = new \App\AssignCompanyTags();
        $tag9->company_id = 3;
        $tag9->company_tag_id = 5;
        $tag9->save();

        $tag10 = new \App\AssignCompanyTags();
        $tag10->company_id = 4;
        $tag10->company_tag_id = 5;
        $tag10->save();

        $tag11 = new \App\AssignCompanyTags();
        $tag11->company_id = 4;
        $tag11->company_tag_id = 3;
        $tag11->save();

        $tag12 = new \App\AssignCompanyTags();
        $tag12->company_id = 4;
        $tag12->company_tag_id = 7;
        $tag12->save();

        $tag13 = new \App\AssignCompanyTags();
        $tag13->company_id = 4;
        $tag13->company_tag_id = 8;
        $tag13->save();

        $tag14 = new \App\AssignCompanyTags();
        $tag14->company_id = 5;
        $tag14->company_tag_id = 5;
        $tag14->save();

        $tag15 = new \App\AssignCompanyTags();
        $tag15->company_id = 5;
        $tag15->company_tag_id = 4;
        $tag15->save();
    }
}
