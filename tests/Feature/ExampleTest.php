<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Seeders\MakeSeeder;
use Database\Seeders\ModelSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $this->seed([MakeSeeder::class, ModelSeeder::class]);

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
