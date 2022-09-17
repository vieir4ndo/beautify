<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    private UserService $userService;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->userService = new UserService(new UserRepository());
        $this->configurePermissions();
        $this->configureLogin();
        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }

    /**
     *
     *
     * @return void
     */
    protected function configureLogin()
    {
        Fortify::authenticateUsing(function (Request $request) {
            $user = $this->userService->getUserByEmail($request->input('email'));

            if ($user == null){
                return null;
            }

            if ($user->isAdministrator() or $user->isEmployee() or $user->isCompanyAdministrator()){
                if (Hash::check($request->input('password'), $user->password)) {
                    return $user;
                }
            }
            return null;
        });
    }
}
