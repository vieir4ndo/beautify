<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function create($input){
        return User::create($input);
    }

    public function getUserById($id)
    {
        return User::where("id", $id)->first();
    }

    public function update(string $id, $input){
        return User::where("id", $id)->update($input);
    }

    public function getUsersByType($userType){
        return User::where("type", $userType)->get();
    }

}
