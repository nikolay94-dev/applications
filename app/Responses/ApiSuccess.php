<?php

namespace App\Responses;

final class ApiSuccess implements ApiResponseDataInterface
{

    /**
     * @return array
     */
    public function getData(): array
    {
        return
            [
                'success' => true
            ];
    }
}
