<?php

namespace Tests\Feature;

use Redsocialapre\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateStatusTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function an_athenticated_user_can_create_statuses()
    {
        $this->withExceptionHandling();
        // 1. Given => Teniendo un usuario autenticado
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // 2. When => Cuando hace un post request a status
         $this->postJson(route('statuses.store'),['body'=>'Mi primer status']);
        //$response->assertSuccessful();
       /* $response->assertJson([
            'data'=>['body' =>'Mi primer status'],
        ]);/**/
        // 3. Then => Entonces veo un nuevo estado en la base de datos
        $this->assertDatabaseHas('statuses',[
           // 'user_id' => $user->id,
            'body' => 'Mi primer status'
        ]);
    }
}
