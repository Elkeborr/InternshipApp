<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $state1 = new \App\State();
        $state1->state = 'Antwerpen';
        $state1->save();

        $state2 = new \App\State();
        $state2->state = 'Vlaams-Brabant';
        $state2->save();

        $state3 = new \App\State();
        $state3->state = 'Waals-Brabant';
        $state3->save();

        $state4 = new \App\State();
        $state4->state = 'West-Vlaanderen';
        $state4->save();

        $state5 = new \App\State();
        $state5->state = 'Oost-Brabant';
        $state5->save();

        $state6 = new \App\State();
        $state6->state = 'Luik';
        $state6->save();

        $state7 = new \App\State();
        $state7->state = 'Hennegouwen';
        $state7->save();

        $state8 = new \App\State();
        $state8->state = 'Namen';
        $state8->save();

        $state9 = new \App\State();
        $state9->state = 'Limburg';
        $state9->save();

        $state10 = new \App\State();
        $state10->state = 'Brussel';
        $state10->save();

        $state11 = new \App\State();
        $state11->state = 'Luxemburg';
        $state11->save();
    }
}
