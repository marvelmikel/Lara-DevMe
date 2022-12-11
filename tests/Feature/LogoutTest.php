<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    /**
     * Test the signout route returns a successful response.
     *
     * @return void
     */
    public function test_the_singout_route_returns_redirect_response()
    {
        $response = $this->get('/signout');
        $response->assertStatus(302);
    }
}
