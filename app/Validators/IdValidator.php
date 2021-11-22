<?php

namespace App\Validators;

final class IdValidator extends BaseValidator
{


    protected function rules()
    {
        return [
            'id' => 'required|integer'
        ];
    }

    public function validate($data)
    {
        return $this->validateByData(['id' => $data]);
    }
}
