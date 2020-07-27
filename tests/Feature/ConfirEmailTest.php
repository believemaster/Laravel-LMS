<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConfirEmailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_can_confirm_email()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->get("/register/confirm/?token={$user->confirm_token}")
            ->assertRedirect('/')
            ->assertSessionHas('success', 'Your email has been confirm');

        $this->assertTrue($user->fresh()->isConfirmed());
    }

    public function test_a_user_is_redirected_if_token_is_wrong()
    {
        $user = factory(User::class)->create();

        $this->get("/register/confirm/?token=WRONG_TOKEN")
            ->assertRedirect('/')
            ->assertSessionHas('error', 'Confirmation Token Not Recognized');
    }
}
