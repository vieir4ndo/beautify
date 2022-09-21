<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\StringHelper;
use App\Http\Validators\UserValidator;
use App\Services\CompanyService;
use App\Services\UserService;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    private UserService $userService;
    private CompanyService $companyService;

    public function __construct(UserService $userService, CompanyService $companyService)
    {
        $this->userService = $userService;
        $this->companyService = $companyService;
    }

    public function index()
    {
        return view("administrator.user.index");
    }

    public function form($id = null)
    {
        try {
            $companies = $this->companyService->getAllCompanies();

            $user = ($id != null) ? $this->userService->getUserById($id) : null;

            return view("administrator.user.form", [
                "title" => ($user != null) ? "Editar" : "Novo",
                "user" => $user,
                "companies" => $companies]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            toast("Houve um erro ao processar sua solicitação, tente novamente.", 'error');
            return back();
        }
    }

    public function create(Request $request)
    {
        try {
            $input = [
                "name" => $request["name"],
                "email" => $request["email"],
                "phone_number" => $request["phone_number"],
                "type" => $request["type"],
                "company_id" => $request["company_id"],
                "birth_date" => $request["birth_date"],
                "photo" => $request["photo"],
                "active" => $request["active"] == "true",
            ];

            $validation = Validator::make($input, UserValidator::createRules());

            if ($validation->fails()) {
                toast(Arr::flatten($validation->errors()->all()), 'error');
                return back();
            }

            $this->userService->create($input);

            toast('Operação realizada com sucesso!', 'success');
            return redirect()->route("web.administrator.user.index");
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            toast("Houve um erro ao processar sua solicitação, tente novamente.", 'error');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $input = [
                "name" => $request["name"],
                "phone_number" => StringHelper::onlyNumbers($request["phone_number"]),
                "type" => $request["type"],
                "company_id" => $request["company_id"],
                "birth_date" => $request["birth_date"],
                "active" => $request["active"] == "true",
                "photo" => $request["photo"],
            ];

            $validation = Validator::make($input, UserValidator::updateRules($request["email"], $input["phone_number"]));

            if ($validation->fails()) {
                toast(Arr::flatten($validation->errors()->all()), 'error');
                return back();
            }

            $this->userService->update($id, $input);

            toast('Operação realizada com sucesso!', 'success');
            return redirect()->route("web.administrator.user.index");
        } catch (\Exception $e) {
            Log::error($e);
            toast("Houve um erro ao processar sua solicitação, tente novamente.", 'error');
            return back();
        }
    }
}
