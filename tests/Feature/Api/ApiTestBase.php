<?php

namespace Tests\Feature\Api;

use Database\Seeders\ApiTests\ApplicationsTestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Helpers\Api;
use Tests\TestCase;

class ApiTestBase extends TestCase
{
    use RefreshDatabase;

    protected $api;

    protected $seedClass = ApplicationsTestSeeder::class;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed($this->seedClass);

        $this->api = new Api($this->app);
    }

}
