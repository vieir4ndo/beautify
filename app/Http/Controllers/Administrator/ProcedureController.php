<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Validators\ProcedureValidator;
use App\Services\ProcedureService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProcedureController extends Controller
{
    private ProcedureService $procedureService;

    public function __construct(ProcedureService $procedureService)
    {
        $this->procedureService = $procedureService;
    }

    public function index()
    {
        return view("administrator.procedure.index");
    }

    public function formCreate()
    {
        return view("administrator.procedure.form-create");
    }

    public function formUpdate($id)
    {
        return view("administrator.procedure.form-update");
    }

    public function create(Request $request){
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

    public function update(Request $request){

    }
}
