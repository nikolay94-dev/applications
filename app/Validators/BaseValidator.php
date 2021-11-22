<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

abstract class BaseValidator
{
    protected function validateByData($data)
    {
        $validator = Validator::make(
            $data,
            $this->rules()
        );

        if ($validator->fails()) {
            return $validator->getMessageBag();
        }

        return null;
    }

    abstract public function validate($data);

    abstract protected function rules();
}
