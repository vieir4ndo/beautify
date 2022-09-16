<?php

namespace App\Actions\Jetstream;

use App\Services\UserService;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        $user->tokens->each->delete();
        $this->userService->update($user->id, [
            "active" => !$user->active
        ]);
    }
}
