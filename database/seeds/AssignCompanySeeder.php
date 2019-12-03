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
        $tag->company_id = '0ad8a5c0-15f2-11ea-8b45-f5b83395526f';
        $tag->company_tag_id = 7;
        $tag->save();

        $tag2 = new \App\AssignCompanyTags();
        $tag2->company_id = '0ad8a5c0-15f2-11ea-8b45-f5b83395526f';
        $tag2->company_tag_id = 8;
        $tag2->save();

        $tag3 = new \App\AssignCompanyTags();
        $tag3->company_id = '0ad8a5c0-15f2-11ea-8b45-f5b83395526f';
        $tag3->company_tag_id = 3;
        $tag3->save();

        $tag4 = new \App\AssignCompanyTags();
        $tag4->company_id = '0ad8a5c0-15f2-11ea-8b45-f5b83395526f';
        $tag4->company_tag_id = 4;
        $tag4->save();

        $tag5 = new \App\AssignCompanyTags();
        $tag5->company_id = '0ad8ffa0-15f2-11ea-8f92-3b4ec8d668b8';
        $tag5->company_tag_id = 4;
        $tag5->save();

        $tag6 = new \App\AssignCompanyTags();
        $tag6->company_id = '0ad8ffa0-15f2-11ea-8f92-3b4ec8d668b8';
        $tag6->company_tag_id = 10;
        $tag6->save();

        $tag7 = new \App\AssignCompanyTags();
        $tag7->company_id = '0ad8ffa0-15f2-11ea-8f92-3b4ec8d668b8';
        $tag7->company_tag_id = 9;
        $tag7->save();

        $tag8 = new \App\AssignCompanyTags();
        $tag8->company_id = '0ad8ffa0-15f2-11ea-8f92-3b4ec8d668b8';
        $tag8->company_tag_id = 12;
        $tag8->save();

        $tag9 = new \App\AssignCompanyTags();
        $tag9->company_id = '0ad94410-15f2-11ea-924b-7be5c953c590';
        $tag9->company_tag_id = 5;
        $tag9->save();

        $tag10 = new \App\AssignCompanyTags();
        $tag10->company_id = '0ad9a7f0-15f2-11ea-bffc-5d5cc5e61c51';
        $tag10->company_tag_id = 5;
        $tag10->save();

        $tag11 = new \App\AssignCompanyTags();
        $tag11->company_id = '0ad9a7f0-15f2-11ea-bffc-5d5cc5e61c51';
        $tag11->company_tag_id = 3;
        $tag11->save();

        $tag12 = new \App\AssignCompanyTags();
        $tag12->company_id = '0ad9a7f0-15f2-11ea-bffc-5d5cc5e61c51';
        $tag12->company_tag_id = 7;
        $tag12->save();

        $tag13 = new \App\AssignCompanyTags();
        $tag13->company_id = '0ad9a7f0-15f2-11ea-bffc-5d5cc5e61c51';
        $tag13->company_tag_id = 8;
        $tag13->save();

        $tag14 = new \App\AssignCompanyTags();
        $tag14->company_id = '0ada05f0-15f2-11ea-ab5c-1f9a1fce278e';
        $tag14->company_tag_id = 5;
        $tag14->save();

        $tag15 = new \App\AssignCompanyTags();
        $tag15->company_id = '0ada05f0-15f2-11ea-ab5c-1f9a1fce278e';
        $tag15->company_tag_id = 4;
        $tag15->save();
    }
}
