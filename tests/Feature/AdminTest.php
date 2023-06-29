<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Make;
use App\Models\CarModel;
use App\Models\Listing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    private User $user;
    private User $admin;
    private Make $make;
    private CarModel $model;
    private Listing $listing;


    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->admin = User::factory()->create([
            'is_admin' => true
        ]);

        $this->make = Make::factory()->create();

        $this->model = CarModel::factory()->create([
            'make_id' => $this->make->id
        ]);

        $this->listing = Listing::factory()->for($this->user)->create([
            'make_id' => $this->make->id,
            'model_id' => $this->model->id
        ]);
        
    }


    public function test_admin_can_view_admin_panel(): void
    {
       $response = $this->actingAs($this->admin)->get('/admin');

       $response->assertStatus(200);
        
    }

    public function test_guest_cannot_view_admin_panel()
    {
        $response = $this->get('/admin');

        $response->assertStatus(403);
    }

    public function test_user_cannot_view_admin_panel()
    {
        $response = $this->actingAs($this->user)->get('/admin');

        $response->assertStatus(403);
    }

    public function test_admin_can_delete_user_listing()
    {
        $this->assertDatabaseHas('listings', [
            'id' => $this->listing->id
        ]);

        $this->actingAs($this->admin)->delete('/listing/' . $this->listing->id);

        $this->assertDatabaseMissing('listings', [
            'id' => $this->listing->id
        ]);
    }

    public function test_admin_can_view_user_listing_edit_form()
    {
        $response = $this->actingAs($this->admin)->get('/listing/edit/' . $this->listing->id);

        $response->assertStatus(200);
    }

    public function test_admin_can_update_listing()
    {
        $this->assertDatabaseHas('listings', [
            'id' => $this->listing->id,
            'fuel' => 'Diesel'
        ]);

        $this->actingAs($this->admin)->put('/listing/update/' . $this->listing->id, [
            'make_id' => $this->make->id,
            'model_id' => $this->model->id,
            'year' => 1986,
            'body' => 'Wagon',
            'horsepower' => 150,
            'capacity' => 1998,
            'doors' => 5,
            'color' => 'Silver',
            'transmission' => 'Manual',
            'fuel' => 'Gas'
        ]);

        $this->assertDatabaseHas('listings', [
            'id' => $this->listing->id,
            'fuel' => 'Gas'
        ]);
    }
}
