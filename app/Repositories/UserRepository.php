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
            "birth_date" => $input["birth_date"],
            "active" => $input["active"]
        ]);
    }

    public function getUserById($id)
    {
        return User::where("id", $id)->first();
    }

    public function update(string $id, $input){
        return User::where("id", $id)->update($input);
    }

}
