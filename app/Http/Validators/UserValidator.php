<?php

namespace App\Http\Validators;

use Illuminate\Validation\Rule;

class UserValidator
{
    public static function createRules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'unique:users'],
            'type' => ['required', 'integer'],
            'company_id' => ["nullable", 'integer', 'exists:companies,id'],
            'birth_date' => ["nullable", 'date'],
            'active' => ["required", 'bool'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ];
    }

    public static function updateRules($email, $phone_number)
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('users')->ignore($email, 'email')],
            'phone_number' => ['nullable', 'string', Rule::unique('users')->ignore($phone_number, 'phone_number')],
            'type' => ['nullable', 'integer'],
            'company_id' => ["nullable", 'integer', 'exists:companies,id'],
            'birth_date' => ["nullable", 'date'],
            'active' => ["nullable", 'bool'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ];
    }
}
