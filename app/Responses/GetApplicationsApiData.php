<?php

namespace App\Responses;

final class GetApplicationsApiData implements ApiResponseDataInterface
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return
            [
                'success' => true,
                'result' => $this->data
            ];
    }

}
