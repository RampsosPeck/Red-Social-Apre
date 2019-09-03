<?php

namespace Tests\Feature;

use Redsocialapre\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CreateStatusTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**@test*/
    function guests_users_can_not_create_statuses()
    {
        //$this->withExceptionHandling();
        $response =  $this->post(route('statuses.store'),['body'=>'Mi primer status']);
        //dd($response->content());
        $response->assertRedirect('login');
    }

    /** @test */
    public function an_athenticated_user_can_create_statuses()
    {
        $this->withoutExceptionHandling();
        //$this->withoutExceptionHandling();
        // 1. Given => Teniendo un usuario autenticado
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // 2. When => Cuando hace un post request a status
        $response = $this->post(route('statuses.store'),['body'=>'Mi primer status']);
        //$response->assertSuccessful();
        //$response->assertRedirect('/');
        $response->assertJson([
            'body' =>'Mi primer status',
        ]);
        // 3. Then => Entonces veo un nuevo estado en la base de datos
        $this->assertDatabaseHas('statuses',[
            'user_id' => $user->id,
            'body' => 'Mi primer status'
        ]);
    }
}
