<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    public function getAllCompanies(){
        return Company::all();
    }

    public function create($input){
        return Company::create($input);
    }
}
