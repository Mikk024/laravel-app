<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_login_view(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => 'password'
        ]);


        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/');
    }
}
