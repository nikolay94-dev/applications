<?php

namespace App\Mappers;

use App\Helpers\DateHelper;
use App\Models\Application;

final class ApplicationMapper implements DataInterface
{

    private $data;

    public function __construct(Application $data)
    {
        $this->data = $data;
    }

    public function getData()
    {

        return [
            'id' => $this->data->id,
            'name' => $this->data->name,
            'description' => $this->data->description,
            'created_at' => $this->data->created_at,
            'finished_at' => (new DateHelper())->getFormattedDate($this->data->finished_at),
            'status' => $this->data->status,
            'photo_name' => $this->data->photo,
            'statuses' => $this->data::STATUSES
        ];
    }
}
