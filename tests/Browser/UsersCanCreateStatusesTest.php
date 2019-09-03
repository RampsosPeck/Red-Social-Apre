<?php

namespace Tests\Browser;

use Redsocialapre\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UsersCanCreateStatusesTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @test
     * @throws \Throwable
     */
    public function users_can_create_statuses()
    {
        //Creamos al usuario
        $user = factory(User::class)->create();
        $this->browse(function (Browser $browser) use($user) {
            $browser->loginAs($user)
                ->visit('/')
                ->type('body','Mi primer status')
                ->press('#create-status')
                ->waitForText('Mi primer status')
                //->screenshot('create-status')
                ->assertSee('Mi primer status');
               // ->assertSee($user->name);
        });
    }
}
