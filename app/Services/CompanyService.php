<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService
{
    private CompanyRepository $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllCompanies(){
        return $this->repository->getAllCompanies();
    }

    public function create($input){
        return $this->repository->create($input);
    }

    public function getCompanyById($id){
        return $this->repository->getCompanyById($id);
    }

    public function update($id, $input)
    {
        return $this->repository->update($id, $input);
    }
}
