<?php

namespace App\Http\Validators;

class ProcedureValidator
{
    public static function createRules()
    {

        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'image_path' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'date_format:H:i:s'],
            'price' => ['required', 'numeric'],
            'company_id' => ["nullable", 'integer', 'exists:companies,id'],
            'active' => ["required", 'bool'],
        ];
    }

    public static function updateRules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'image_path' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'date_format:H:i:s'],
            'price' => ['required', 'numeric'],
            'company_id' => ["nullable", 'integer', 'exists:companies,id'],
            'active' => ["required", 'bool'],
        ];
    }
}
