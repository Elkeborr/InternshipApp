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
        $review->review = 'Leuke en leerrijke plaats om stage te doen, zeker de moeite waard. De koffie was er wel niet al te lekker.';
        $review->score = 3;
        $review->save();

        $review2 = new \App\Review();
        $review2->company_id = 2;
        $review2->user_id = 3;
        $review2->review = 'Zeer leuk bedrijf met vriendelijke mensen. Voelde me helemaal thuis tijdens men stage daar!';
        $review2->score = 4;
        $review2->save();
    }
}
