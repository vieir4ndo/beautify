<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Validators\ProcedureValidator;
use App\Services\CompanyService;
use App\Services\ProcedureService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProcedureController extends Controller
{
    private ProcedureService $procedureService;
    private CompanyService $companyService;

    public function __construct(ProcedureService $procedureService, CompanyService $companyService)
    {
        $this->procedureService = $procedureService;
        $this->companyService = $companyService;
    }

    public function index()
    {
        return view("administrator.procedure.index");
    }

    public function form($id = null)
    {
        try {
            $companies = $this->companyService->getAllCompanies();

            $procedure = ($id != null) ? $this->procedureService->getProcedureById($id) : null;

            return view("administrator.procedure.form", [
                "title" => ($procedure != null) ? "Editar" : "Novo",
                "companies" => $companies,
                "procedure" => $procedure
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            toast("Houve um erro ao processar sua solicitação, tente novamente.", 'error');
            return back();
        }
    }

    public function create(Request $request)
    {
        try {
            $input = [
                'title' => $request["title"],
                'description' => $request["description"],
                'image_path' => $request["image_path"],
                'duration' => $request["duration"],
                'price' => $request["price"],
                'company_id' => $request["company_id"],
                'active' => $request["active"] == "true",
            ];

            $validation = Validator::make($input, ProcedureValidator::createRules());

            if ($validation->fails()) {
                toast(Arr::flatten($validation->errors()->all()), 'error');
                return back();
            }

            $this->procedureService->create($input);

            toast('Operação realizada com sucesso!', 'success');
            return redirect()->route("web.administrator.procedure.index");
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            toast("Houve um erro ao processar sua solicitação, tente novamente.{$e->getMessage()}", 'error');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $input = [
                'title' => $request["title"],
                'description' => $request["description"],
                'image_path' => $request["image_path"],
                'duration' => $request["duration"],
                'price' => $request["price"],
                'company_id' => $request["company_id"],
                'active' => $request["active"] == "true",
            ];

            $validation = Validator::make($input, ProcedureValidator::updateRules());

            if ($validation->fails()) {
                toast(Arr::flatten($validation->errors()->all()), 'error');
                return back();
            }

            $this->procedureService->update($id, $input);

            toast('Operação realizada com sucesso!', 'success');
            return redirect()->route("web.administrator.procedure.index");
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            toast("Houve um erro ao processar sua solicitação, tente novamente.");
            return back();
        }
    }
}
