<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BeerApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function test_beer_api_integration(): void
    {
        $user = User::factory()->create();

        $this->assertDatabaseCount('personal_access_tokens', 0);
        $this->assertDatabaseCount('users', 1);

        $response = $this
            ->actingAs($user)
            ->post('/token');

        $this->assertDatabaseCount('personal_access_tokens', 1);

        $token = $user->tokens()->first();

        $this->assertNotNull($token);

        $response = $this
            ->actingAs($user)->getJson(
                '/api/beers',
                [
                    'Authorization' => 'Bearer ' . $token->plainTextToken]
            );
        $response->assertStatus(200);
    }
}
