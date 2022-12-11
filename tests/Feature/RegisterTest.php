<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Http\Controllers\Auth\RegisterController;
use Mockery;
use Illuminate\Support\Facades\Hash;

class RegisterTest extends TestCase
{
    /**
     * Test the register route returns a successful response.
     *
     * @return void
     */
    public function test_the_register_get_route_returns_a_successful_response()
    {
        $controller_class = RegisterController::class;
        $action = 'index';
        $route = route('register');

        // Mock
        $controller_mocked = Mockery::mock($controller_class . '['. 'callAction' .']');
        $this->app->instance($controller_class, $controller_mocked);

        // Assert
        $controller_mocked->shouldReceive('callAction')->withArgs([$action, Mockery::any()])->once();

        // Visit Route
        $response = $this->get($route);
        $response->assertStatus(200);
    }


    public function test_the_registeruser_post_route_returns_a_redirect_response()
    {
        $password = '123456';
        $email = 'testuser@email.com';
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->delete();
        }

        $user = User::create([
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $response = $this->post('/register-user');
        $response->assertStatus(302);
    }

}
