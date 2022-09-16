<?php

namespace App\Http\Validators;

class UserValidator
{
    public static function createRules(){
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'unique:users'],
            'type' => ['required', 'integer'],
            'company_id' => ["nullable",'integer', 'exists:companies,id'],
        ];
    }
}
