<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetApplicationsTest extends ApiTestBase
{
    /** @test */
    public function getApplicationsList()
    {
        $response = $this->api->list();
        $result = $response->json();

        $this->assertTrue($result['success']);
        $this->assertTrue(is_array($result['result']));

        foreach ($result['result'] as $application) {
            $this->assertNotNull($application['id']);
            $this->assertNotNull($application['name']);

        }

    }
}
