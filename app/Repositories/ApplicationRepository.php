<?php

namespace App\Repositories;

use App\Models\Application;

class ApplicationRepository
{
    public function getAll()
    {
        return Application::all();
    }

    public function create(array $data): Application
    {
        $application = new Application();

        return $this->fillData($application, $data);
    }

    /**
     * @return Application|null
     * */
    public function getById(int $id)
    {
        return Application::find($id);
    }

    /**
     * @return Application|null
     * */
    public function update(array $data, int $id)
    {
        $application = $this->getById($id);

        return $application ? $this->fillData($application, $data) : null;
    }

    private function fillData(Application $application, array $data): Application
    {
        $application->name = $data['name'];
        $application->photo = $data['photo'] ?? $application->photo;
        $application->description = $data['description'];
        $application->status = $data['status'];
        $application->finished_at = $data['finished_at'];
        $application->save();

        return $application;
    }
}
