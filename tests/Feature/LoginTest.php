<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_correct_response_after_user_logs_in()
    {
        $user = factory(User::class)->create();

        $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'password',
        ])->assertStatus(200)
            ->assertJson([
                'status' => 'ok'
            ])->assertSessionHas('success', 'Successfuly Logged in');
    }

    public function test_a_user_receives_correct_message_when_passing_in_wrong_credentials()
    {
        $user = factory(User::class)->create();

        $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ])->assertStatus(422)
            ->assertJson([
                'message' => 'The creadentials do not match'
            ]);
    }
}
