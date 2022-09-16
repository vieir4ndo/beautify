<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $repository)
    {
        $this->userRepository = $repository;
    }

    public function create($input)
    {
        if ($input['birth_date'] != null) {
            $input['birth_date'] = Carbon::parse($input['birth_date'])->format("Y-m-d");
        }
        $input['password'] = Hash::make($this->generateRandomPassword());

        return $this->userRepository->create($input);
    }

    public function update($id, $input)
    {
        if (isset($input['birth_date'])) {
            $input['birth_date'] = Carbon::parse($input['birth_date'])->format("Y-m-d");
        }
        return $this->userRepository->update($id, $input);
    }

    public function getUserById($id)
    {
        return $this->userRepository->getUserById($id);
    }

    private static function generateRandomPassword($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getUsersByType($userType){
        return $this->userRepository->getUsersByType($userType);
    }
}
