<?php

namespace Tests\Feature\Api;

use App\Models\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateApplicationTest extends ApiTestBase
{
    const APPLICATION_NAME = 'name from tests';

    /** @test */
    public function updateApplicationReturnSuccess()
    {
        $data = [
            'name' => self::APPLICATION_NAME,
            'description' => 'description',
            'status' => 1,
            'finished_at' => '2021-11-21 15:15:15'
        ];

        $response = $this->api->update(1, $data);
        $result = $response->json();

        $this->assertTrue($result['success']);

    }

    /** @test */
    public function updateApplicationWithoutNameReturnError()
    {
        $data = [
            'name' => '',
            'description' => 'description',
            'status' => 1,
            'finished_at' => '2021-11-21 15:15:15'
        ];

        $response = $this->api->update(1, $data);
        $result = $response->json();

        $this->assertFalse($result['success']);
        $error = $result['error'];

        $this->assertEquals(
            $error['code'],
            403
        );

        $this->assertEquals(
            $error['message']['name'],
            ['The name field is required.']
        );

    }

    /** @test */
    public function updateApplicationWithoutStatusReturnError()
    {
        $data = [
            'name' => 'test name',
            'description' => 'description',
            'finished_at' => '2021-11-21 15:15:15'
        ];

        $response = $this->api->update(1, $data);
        $result = $response->json();

        $this->assertFalse($result['success']);
        $error = $result['error'];

        $this->assertEquals(
            $error['code'],
            403
        );

        $this->assertEquals(
            $error['message']['status'],
            ['The status field is required.']
        );
    }

        /*TODO: add check on status in Application::STATUSES*/
        /*TODO: add creating photo*/
    private function checkOnCreatedApplication()
    {
        return Application::where('name', self::APPLICATION_NAME)->first();
    }
}
