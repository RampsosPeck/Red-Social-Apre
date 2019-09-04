<?php

namespace Tests\Feature;

use Redsocialapre\Models\Status;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListStatusesTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @test
     */
    public function can_get_all_statuses()
    {
        $this->withoutExceptionHandling();


        $status1 = factory(Status::class)->create(['created_at' => now()->subDays(4)]);
        $status2 = factory(Status::class)->create(['created_at' => now()->subDays(3)]);
        $status3 = factory(Status::class)->create(['created_at' => now()->subDays(2)]);
        $status4 = factory(Status::class)->create(['created_at' => now()->subDays(1)]);

        $response = $this->getJson(route('statuses.index'));


        $response->assertSuccessful();

        $response->assertJson([
             'meta' => ['total' => 4]
        ]);

        $response->assertJsonStructure([
           'data','links' => ['prev','next']
        ]);

        $this->assertEquals(
            $status4->body,
            $response->json('data.0.body')
        );
    }
}
