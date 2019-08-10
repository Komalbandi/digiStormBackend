<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class LoginTest extends TestCase
{

    public function testValidation()
    {
        $url = config('app.url').'/login';

        $response = $this->json('POST', $url, ['email' => 'sally', 'password' => 'abc123']);

        $response->assertStatus(422);
    }

    public function testAuthentication(){
        $url = config('app.url').'/login';

        $users=User::all();

        $response = $this->json('POST', $url, ['email' => $users[0]->email, 'password' => 'abc123']);

        $response->assertStatus(200);
    }
}
