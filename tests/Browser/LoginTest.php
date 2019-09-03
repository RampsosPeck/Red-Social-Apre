<?php

namespace Tests\Browser;

use Redsocialapre\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @test
     * @throws \Throwable
     */
    public function registered_users_can_login()
    {
        factory(User::class)->create(['email' => 'jorge@gmail.com']);

        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email','jorge@gmail.com')
                ->type('password','password')
                ->press('#login-btn')
                ->assertPathIs('/')
                ->assertAuthenticated();
        });
    }
}
