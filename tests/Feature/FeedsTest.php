<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedsTest extends TestCase
{
    public function test_index_route_returns_redirect_response()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

    public function test_getfeed_by_id_route_returns_redirect_response()
    {
        $response = $this->get('/feed/{id}');
        $response->assertStatus(302);
    }


}
