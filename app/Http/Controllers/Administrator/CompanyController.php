<?php

namespace App\Http\Controllers\Administrator;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Validators\CompanyValidator;
use App\Services\CompanyService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    private CompanyService $companyService;
    private UserService $userService;

    public function __construct(CompanyService $companyService, UserService $userService)
    {
        $this->companyService = $companyService;
        $this->userService = $userService;
    }

    public function index()
    {
        return view("administrator.company.index");
    }

    public function formCreate()
    {
        try {
            $companyAdministrators = $this->userService->getUsersByType(UserType::CompanyAdministrator->value);

            return view("administrator.company.form-create", ["companyAdministrators" => $companyAdministrators]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            toast("Houve um erro ao processar sua solicitação, tente novamente.", 'error');
            return back();
        }


    }

    public function formUpdate()
    {
        return view("administrator.company.form-update");
    }

    public function create(Request $request){
        try {
            $input = [
                'name' => $request["name"],
                'fantasy_name' => $request["fantasy_name"],
                'description' => $request["description"],
                'federal_registration' => $request["federal_registration"],
                'email' => $request["email"],
                'phone_number' => $request["phone_number"],
                'logo_path' => $request["logo_path"],
                'address_post_code' => $request["address_post_code"],
                'address_street' => $request["address_street"],
                'address_complement' => $request["address_complement"],
                'address_neighborhood' => $request["address_neighborhood"],
                'address_city' => $request["address_city"],
                'address_state' => $request["address_state"],
                'facebook' => $request["facebook"],
                'instagram' => $request["instagram"],
                'whatsapp' => $request["whatsapp"],
                'administrator_id' => $request["administrator_id"],
                'active' => $request["active"] == "true",
            ];

            $validation = Validator::make($input, CompanyValidator::createRules());

            if ($validation->fails()) {
                toast(Arr::flatten($validation->errors()->all()), 'error');
                return back();
            }

            $this->companyService->create($input);

            toast('Operação realizada com sucesso!', 'success');
            return redirect()->route("web.administrator.company.index");
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            toast("Houve um erro ao processar sua solicitação, tente novamente.", 'error');
            return back();
        }
    }

    public function update(Request $request){

    }
}
