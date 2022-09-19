<?php

namespace App\Http\Livewire\Administrator;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProcedureForm extends Component
{
    use WithFileUploads;

    public $companies;
    public $procedure_id = null;
    public $title = null;
    public $description = null;
    public $duration = null;
    public $price = null;
    public $company_id = null;
    public $active = null;
    public $image_path = null;
    public $photo;

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

    // TODO Implement to save the photo permanently

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $this->photo->store('photos');
    }
}
