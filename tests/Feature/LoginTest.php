<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\Auth\LoginController;
use Mockery;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{

    public function test_user_can_view_a_login_form()
    {
        $controller_class = LoginController::class;
        $action = 'index';
        $route = route('login');

        // Mock
        $controller_mocked = Mockery::mock($controller_class . '['. 'callAction' .']');
        $this->app->instance($controller_class, $controller_mocked);

        // Assert
        $controller_mocked->shouldReceive('callAction')->withArgs([$action, Mockery::any()])->once();

        // Visit Route
        $response = $this->get($route);
        $response->assertStatus(200);

    }

    public function test_the_loginuser_post_route_returns_a_redirect_response()
    {
        $response = $this->post('/login-user');
        $response->assertStatus(302);
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $password = '123456';
        $email = 'testuser@email.com';

        $user = User::where('email', $email)->first();
        if ($user) {
            $user->delete();
        }
        $user = User::create([
            'password' => Hash::make($password),
            'email' => $email
        ]);

        $response = $this->post('/login-user', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }
}
