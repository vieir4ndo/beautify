<?php

namespace App\Http\Livewire\Administrator;

use App\Services\CompanyService;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ProcedureForm extends Component
{
    private CompanyService $companyService;

    public $title = "";
    public $description = "";
    public $duration = "";
    public $price = "";
    public $company_id = "";
    public $active = "";
    public $image_path = "";

    // TODO Add rules to the form itself and not the controller

    // TODO Find a way to use the same form for creation and update

    public function boot(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function render()
    {
        try {
            $companies = $this->companyService->getAllCompanies();

            return view('livewire.administrator.procedure-form', ["companies" => $companies]);
        } catch (\Exception $e) {
            Log::error($e);
            toast("Houve um erro ao processar sua solicitação, tente novamente.", 'error');
            return back();
        }
    }
}
