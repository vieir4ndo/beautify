<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Validators\UserValidator;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view("administrator.user.index");
    }

    public function form()
    {
        return view("administrator.user.form");
    }

    public function create(Request $request){
        try {
            $input = [
                "name" => $request["name"],
                "email" => $request["email"],
                "phone_number" => $request["phone_number"],
                "type" => $request["type"],
                "company_id" => $request["company_id"],
            ];

            $validation = Validator::make($input, UserValidator::createRules());

            if ($validation->fails()) {
                toast(Arr::flatten($validation->errors()->all()),'error');
                return back();
            }

            $this->userService->create($input);

            toast('Usuário criado com sucesso!','success');
            return back();
        }
        catch (\Exception $e){
            Log::error($e);
            toast("Houve um erro ao processar sua solicitação, tente novamente.",'error');
            return back();
        }
    }
}
