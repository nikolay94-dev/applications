<?php

namespace Tests\Feature\Helpers;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;

final class Api
{
    use MakesHttpRequests;

    /**
     * The Illuminate application instance.
     *
     * @var Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function list()
    {
        return $this->get(
            '/api/v1/application/list'
        );
    }

    public function create($data)
    {
        return $this->post(
            '/api/v1/application/store',
            $data
        );
    }

    public function getApplication($id)
    {
        return $this->get(
            '/api/v1/application/' . $id
        );
    }

    public function update($id, $data)
    {
        return $this->post(
            '/api/v1/application/' . $id . '/update',
            $data
        );
    }
}
