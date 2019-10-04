<?php

use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $review = new \App\Review();
        $review->company_id = 1;
        $review->user_id = 1;
        $review->review = 'Great place!';
        $review->save();
    }
}
