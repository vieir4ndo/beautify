<?php

namespace App\Http\Livewire\Administrator;

use Livewire\Component;
use Livewire\WithFileUploads;

class UserForm extends Component
{
    use WithFileUploads;

    public $companies;
    public $user_id = null;
    public $name = null;
    public $email = null;
    public $phone_number = null;
    public $type = null;
    public $company_id = null;
    public $birth_date = null;
    public $active = null;
    public $profile_photo_url = null;
    public $photo;

    public function mount($user, $companies)
    {
        $this->companies = $companies;

        $this->user_id = $user["id"] ?? null;
        $this->name = $user["name"] ?? null;
        $this->email = $user["email"] ?? null;
        $this->phone_number = $user["phone_number"] ?? null;
        $this->type = $user["type"] ?? null;
        $this->company_id = $user["company_id"] ?? null;
        $this->birth_date = $user["birth_date"] ?? null;
        $this->active = $user["active"] ?? null;
        $this->profile_photo_url = $user["profile_photo_url"] ?? null;
    }

    public function render()
    {
        return view('livewire.administrator.user-form');
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
