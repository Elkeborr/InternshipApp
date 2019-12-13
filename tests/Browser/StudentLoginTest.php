<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class StudentLoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testStudentLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students/login')
                    ->assertSee('Studentlogin')
                    ->type('email', 'elke@student.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home');

            // ->press('.dropdown-toggle')
                    // ->press('.dropdown-logout');
        });
    }
}
