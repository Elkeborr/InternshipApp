<?php

namespace Tests\Browser;

use Tests\DuskTestCase;

class InternshipsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testInternship()
    {
        $this->browse(function ($first, $second) {
            $first->visit('/companies/login')
                  ->assertSee('Bedrijfslogin')
                  ->type('email', 'weske@company.com')
                  ->type('password', 'password')
                  ->press('Login')
                  ->assertPathIs('/home')

                  ->clickLink('Mijn stageplaatsen')
                  ->assertPathIs('/internships/myinternships')

                  ->clickLink('Voeg nieuwe stageplaats toe')
                  ->assertPathIs('/internships/myinternships/create')
                  ->assertSee('Nieuwe stageplaats')

                  ->type('internshipFunction', 'Nieuwe Dusk Test')
                  ->type('discription', 'Nieuwe test ingevult door Dusk')
                  ->type('spots', '15')
                  ->press('Opslaan')
                  ->assertPathIs('/internships/myinternships')
                  ->assertSee('Nieuwe Dusk Test');

            $second->visit('/students/login')
                    ->assertSee('Studentlogin')
                    ->type('email', 'elke@student.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home')

                    ->clickLink('Stageplaatsen')
                    ->assertSee('Nieuwe Dusk Test');

            // $first->waitForText('Hey Taylor')
            //       ->assertSee('Jeffrey Way');
        });
    }
}
