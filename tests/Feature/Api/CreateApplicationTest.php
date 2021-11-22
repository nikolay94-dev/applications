<?php

namespace Tests\Feature\Api;

use App\Models\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateApplicationTest extends ApiTestBase
{
    const APPLICATION_NAME = 'name from tests';

    /** @test */
    public function createApplicationReturnSuccess()
    {
        $data = [
            'name' => self::APPLICATION_NAME,
            'description' => 'description',
            'status' => 1,
            'finished_at' => '2021-11-21 15:15:15'
        ];

        $response = $this->api->create($data);
        $result = $response->json();

        $application = $this->checkOnCreatedApplication();
        $this->assertNotNull($application);
        $this->assertEquals(Application::class, get_class($application));
        $this->assertTrue($result['success']);

    }

    /** @test */
    public function createApplicationWithoutNameReturnError()
    {
        $data = [
            'name' => '',
            'description' => 'description',
            'status' => 1,
            'finished_at' => '2021-11-21 15:15:15'
        ];

        $response = $this->api->create($data);
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
    public function createApplicationWithoutStatusReturnError()
    {
        $data = [
            'name' => 'test name',
            'description' => 'description',
            'finished_at' => '2021-11-21 15:15:15'
        ];

        $response = $this->api->create($data);
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
