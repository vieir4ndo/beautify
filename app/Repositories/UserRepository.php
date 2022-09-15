<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function create($input){
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => $input['password'],
            'phone_number' => $input['phone_number'],
        ]);
    }
}
