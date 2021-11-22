<?php

namespace App\Responses;

final class ApiErrorData implements ApiResponseDataInterface
{

    private $code;
    private $message;

    public function __construct($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return
            [
                'success' => false,
                'error' => [
                    'code' => $this->code,
                    'message' => $this->message
                ]
            ];
    }
}
