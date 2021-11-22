<?php

namespace App\Mappers;

use App\Helpers\DateHelper;
use App\Models\Application;

final class ApplicationsMapper implements DataInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        $data = [];
        foreach ($this->data as $key => $application) {
            $data += [$key => $this->getDataByEntity($application)];
        }

        return $data;
    }

    private function getDataByEntity(Application $application)
    {
        return [
            'id' => $application->id,
            'name' => $application->name,
            'created_at' => $application->created_at,
            'finished_at' => (new DateHelper())->getFormattedDate($application->finished_at),
            'status' => $application::STATUSES[$application->status]
        ];
    }
}
