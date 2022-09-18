<?php

namespace App\Http\Validators;

class ProcedureValidator
{
    public static function createRules(){

        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'image_path' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'date_format:H:i'],
            'price' => ['required', 'numeric'],
            'company_id' => ["nullable",'integer', 'exists:companies,id'],
            'active' => ["required",'bool'],
        ];
    }
}
