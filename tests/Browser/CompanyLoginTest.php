<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CompanyLoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/companies/login')
                    ->assertSee('Bedrijfslogin')
                    ->type('email', 'weske@company.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->press('.dropdown-toggle')
                    ->press('.dropdown-logout');
        });
    }
}
