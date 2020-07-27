<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterationTest extends TestCase
{
    public function test_a_user_has_token_after_registration()
    {
        Mail::fake();

        $this->withoutExceptionHandling();
        // register new user
        $this->post('/register', [
            'name' => 'Jane doe',
            'email' => 'janedoe@jane.com',
            'password' => 'password'

        ])->assertRedirect();

        $user = User::find(1);
        $this->assertNotNull($user->confirm_token);
        $this->assertFalse($user->isConfirmed());
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_has_a_username_after_registration()
    {
        $this->withoutExceptionHandling();

        $this->post('/register', [
            'name' => 'Jane Doe',
            'email' => 'janedoe@jane.com',
            'password' => 'password',

        ])->assertRedirect();

        $this->assertDatabaseHas('users', [
            'username' => Str::slug('Jane Doe')
        ]);
    }

    public function test_an_email_is_sent_to_newly_registered_user()
    {
        Mail::fake();

        $this->withoutExceptionHandling();
        // register new user
        $this->post('/register', [
            'name' => 'Jane Doe',
            'email' => 'janedoe@jane.com',
            'password' => 'password',

        ])->assertRedirect();

        // assert that a particular email was sent
        Mail::assertSent(ConfirmYourEmail::class);
    }
}
