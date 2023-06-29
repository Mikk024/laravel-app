<?php

namespace Tests\Feature;

use App\Models\CarModel;
use App\Models\Listing;
use App\Models\Make;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListingTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    private User $user;
    private Make $make;
    private CarModel $model;

    protected function setUp(): void
    {
        parent::setUp();


        $this->user = User::factory()->create();

        $this->make = Make::factory()->create();

        $this->model = CarModel::factory()->create([
            'make_id' => $this->make->id
        ]);
    }

    public function test_guest_cannot_view_add_listing_form(): void
    {
        $response = $this->get('/listing/create');

        $response->assertRedirect('/login');
    }

    public function test_user_can_view_add_listing_form()
    {
        $response = $this->actingAs($this->user)->get('/listing/create');

        $response->assertStatus(200);
    }

    public function test_user_can_add_listing()
    {
        $response = $this->actingAs($this->user)->post('/listing/store', [
            'make_id' => $this->make->id,
            'model_id' => $this->model->id,
            'fuel' => 'Diesel',
            'year' => 1992,
            'body' => 'Coupe',
            'horsepower' => 150,
            'capacity' => 1997,
            'doors' => 4,
            'color' => 'Black',
            'transmission' => 'Automatic',
        ]);

        $this->assertDatabaseHas('listings',[
            'user_id' => $this->user->id
        ]);

        $response->assertRedirect('/');
    }

    public function test_user_can_edit_listing()
    {
        $listing = Listing::factory()->for($this->user)->create([
            'make_id' => $this->make->id,
            'model_id' => $this->model->id
        ]);


        $this->assertDatabaseHas('listings', [
            'id' => $listing->id,
            'fuel' => 'Diesel'
        ]);

        $this->actingAs($this->user)->put('/listing/update/' . $listing->id, [
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
            'id' => $listing->id,
            'fuel' => 'Gas'
        ]);

    }

    public function test_user_can_view_edit_listing_form()
    {
        $listing = Listing::factory()->for($this->user)->create([
            'make_id' => $this->make->id,
            'model_id' => $this->model->id
        ]);

        $response = $this->actingAs($this->user)->get('/listing/edit/' . $listing->id);

        $response->assertStatus(200);
    }

    public function test_guest_cannot_view_edit_listing_form()
    {
        $listing = Listing::factory()->for($this->user)->create([
            'make_id' => $this->make->id,
            'model_id' => $this->model->id
        ]);

        $response = $this->get('/listing/edit/' . $listing->id);

        $response->assertRedirect('/login');
    }

    public function test_user_can_delete_his_own_listing()
    {
        $listing = Listing::factory()->for($this->user)->create([
            'make_id' => $this->make->id,
            'model_id' => $this->model->id
        ]);

        $this->assertDatabaseHas('listings', [
            'id' => $listing->id
        ]);

        $response = $this->actingAs($this->user)->delete('/listing/' . $listing->id);

        $response->assertRedirect('/');

        $this->assertDatabaseMissing('listings', [
            'id' => $listing->id
        ]);
    }

    public function test_user_cannot_delete_someone_else_listing()
    {
        $users = User::factory(2)->create();

        $firstUser = $users->first();

        $secondUser = $users->last();

        $listing = Listing::factory()->for($firstUser)->create([
            'make_id' => $this->make->id,
            'model_id' => $this->model->id
        ]);

        $this->assertDatabaseHas('listings', [
            'user_id' => $firstUser->id
        ]);

        $response = $this->actingAs($secondUser)->delete('/listing/' . $listing->id);

        $response->assertStatus(403);
    }

    public function test_guest_cannot_delete_listing()
    {
        $listing = Listing::factory()->for($this->user)->create([
            'make_id' => $this->make->id,
            'model_id' => $this->model->id
        ]);

        $this->assertDatabaseHas('listings', [
            'id' => $listing->id
        ]);

        $response = $this->delete('/listing/' . $listing->id);

        $response->assertRedirect('/login');
    }

    public function test_user_can_view_manage_listings()
    {
        $response = $this->actingAs($this->user)->get('/listing/manage');

        $response->assertStatus(200);

        $response->assertSee(`You Don't Have Any Listings`);
    }

    public function test_user_can_view_his_listing_in_manage_listings()
    {
    
        $listing = Listing::factory()->for($this->user)->create([
            'make_id' => $this->make->id,
            'model_id' => $this->model->id
        ]);

        $this->assertDatabaseHas('listings', [
            'id' => $listing->id
        ]);

        $response = $this->actingAs($this->user)->get('/listing/manage');

        $response->assertStatus(200);

        $response->assertDontSee(`You Don't Have Any Listings`);

        $response->assertSee($listing->id);
    }

    public function test_guest_cannot_view_manage_listings()
    {
        $response = $this->get('/listing/manage');

        $response->assertRedirect('/login');
    }

    public function test_can_view_listing()
    {
        $listing = Listing::factory()->for($this->user)->create([
            'make_id' => $this->make->id,
            'model_id' => $this->model->id
        ]);

        $response = $this->get('/listing/' . $listing->id);

        $response->assertStatus(200);
    }

    public function test_cannot_view_non_existing_listing()
    {
        $response = $this->get('/listing/1');

        $response->assertStatus(404);
    }
}
