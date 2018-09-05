<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Register')
                    ->assertSee('Name')
                    ->assertSee('E-Mail Address')
                    ->assertSee('Password')
                    ->assertSee('Confirm Password')
                    ->value('#name', 'Alex at Rentrax')
                    ->value('#email', 'Alex@rentra.io')
                    ->value('#password', '123456')
                    ->value('#password-confirm', '123456')
                    ->click('button[type="submit"]')
                    ->assertPathIs('/home')
                    ->assertSee('You are logged in!');
        });
    }
}
