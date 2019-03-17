<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    public function testUserApiTokenAfterLogin()
    {
        $user = factory(User::class)->create();

        $response = $this->post('/admin/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $response->assertStatus(302);

        //refresh user
        $user = User::whereEmail($user->email)->firstOrFail();
        $this->assertNotEmpty($user->api_token);
    }
}
