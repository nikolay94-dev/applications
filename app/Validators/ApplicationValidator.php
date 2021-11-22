<?php

namespace App\Validators;


final class ApplicationValidator extends BaseValidator
{

    protected function rules()
    {
        return [
            'name' => 'required|string|max:64',
            'status' => 'required|int',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'finished_at' => 'nullable|date'
        ];
    }

    public function validate($data)
    {
        return $this->validateByData($data->all());
    }
}
