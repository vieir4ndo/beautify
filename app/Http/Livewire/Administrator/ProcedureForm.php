<?php

namespace App\Http\Livewire\Administrator;

use Livewire\Component;

class ProcedureForm extends Component
{
    public $companies;
    public $procedure_id = null;
    public $title = null;
    public $description = null;
    public $duration = null;
    public $price = null;
    public $company_id = null;
    public $active = null;
    public $image_path = null;

    // TODO Add rules to the form itself and not the controller

    // TODO Find a way to use the same form for creation and update

    public function mount($procedure, $companies)
    {
        $this->companies = $companies;

        $this->procedure_id = $procedure["id"] ?? null;
        $this->title = $procedure["title"] ?? null;
        $this->description = $procedure["description"] ?? null;
        $this->duration = $procedure["duration"] ?? null;
        $this->price = $procedure["price"] ?? null;
        $this->company_id = $procedure["company_id"] ?? null;
        $this->active = $procedure["active"] ?? null;
        $this->image_path = $procedure["image_path"] ?? null;
    }

    public function render()
    {
        return view('livewire.administrator.procedure-form');
    }
}
