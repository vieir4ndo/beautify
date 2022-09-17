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

    public function getCompanyById($id){
        return Company::where("id", $id)->first();
    }

    public function update(string $id, $input){
        return Company::where("id", $id)->update($input);
    }
}
