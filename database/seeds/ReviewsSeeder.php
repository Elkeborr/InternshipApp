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
        $review->company_id = '0ad8a5c0-15f2-11ea-8b45-f5b83395526f';
        $review->user_id = '0a9e2600-15f2-11ea-9715-b960d8a3ba1b';
        $review->review = 'Leuke en leerrijke plaats om stage te doen, zeker de moeite waard. De koffie was er wel niet al te lekker.';
        $review->internship_id = '07e94d90-15f9-11ea-b7ca-951cf4b1c475';
        $review->score = 3;
        $review->save();

        $review2 = new \App\Review();
        $review2->company_id = '0ad8ffa0-15f2-11ea-8f92-3b4ec8d668b8';
        $review2->user_id = '0aae35d0-15f2-11ea-880d-77b5cff0bed0';
        $review2->review = 'Zeer leuk bedrijf met vriendelijke mensen. Voelde me helemaal thuis tijdens men stage daar!';
        $review2->internship_id = '07e94d90-15f9-11ea-b7ca-951cf4b1c475';
        $review2->score = 4;
        $review2->save();
    }
}
