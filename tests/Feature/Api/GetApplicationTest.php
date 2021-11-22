<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetApplicationTest extends ApiTestBase
{
    /** @test */
    public function getApplicationTest()
    {

        $dataOfFirstApplication = [
            'id' => 1,
            'name' => 'name1',
            'photo' => null,
            'description' => 'description1',
            'finished_at' => null,
            'status' => 1
        ];

        $response = $this->api->getApplication(1);
        $result = $response->json();

        $this->assertTrue($result['success']);
        $this->assertTrue(is_array($result['result']));

        $this->assertEquals(
            $dataOfFirstApplication,
            $this->removeCreatedUpdatedAt($result['result'])
        );

    }

    /** @test */
    public function getApplicationByStringReturnFalse()
    {

        $response = $this->api->getApplication('string');
        $result = $response->json();

        $this->assertFalse($result['success']);

        $error = $result['error'];

        $this->assertEquals(
            $error['code'],
            403
        );

        $this->assertEquals(
            $error['message']['id'],
            ['The id must be an integer.']
        );


    }

    private function removeCreatedUpdatedAt(array $data)
    {
        unset($data['created_at']);
        unset($data['updated_at']);

        return $data;
    }
}
