<?php

namespace App\Http\Validators;

class CompanyValidator
{
    public static function createRules(){
        return [
            'name' => ['required', 'string', 'max:255'],
            'fantasy_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'federal_registration' => ['required', 'string', 'max:13', "min:11"],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],
            'phone_number' => ['required', 'string', 'unique:companies'],
            'logo_path' => ['required', 'string'],
            'address_post_code' => ['required', 'string', 'max:255'],
            'address_street' => ['required', 'string', 'max:255'],
            'address_complement' => ['required', 'string', 'max:255'],
            'address_neighborhood' => ['required', 'string', 'max:255'],
            'address_city' => ['required', 'string', 'max:255'],
            'address_state' => ['required', 'uf', 'max:255'],
            'facebook' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'max:255'],
            'administrator_id' => ["required",'integer', 'exists:users,id'],
            'active' => ["required",'bool'],
        ];
    }
}
