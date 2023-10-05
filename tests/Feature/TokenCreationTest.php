<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TokenCreationTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;
    /**
     * A basic feature test example.
     */
    public function test_new_token_is_created(): void
    {
        $user = User::factory()->create();

        $this->assertDatabaseCount('personal_access_tokens', 0);
        $this->assertDatabaseCount('users', 1);

        $response = $this
            ->actingAs($user)
            ->post('/token');
        $this->assertDatabaseCount('personal_access_tokens', 1);
        $response->assertStatus(200);
    }


    public function test_token_is_deleted(): void
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
            ->actingAs($user)
            ->delete('/token/' . $token->id);

        $this->assertDatabaseCount('personal_access_tokens', 0);

        $response->assertRedirect('/dashboard');
    }
}
