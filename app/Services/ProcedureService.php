<?php

namespace App\Services;

use App\Repositories\ProcedureRepository;

class ProcedureService
{
    private ProcedureRepository $repository;

    public function __construct(ProcedureRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($input){
        return $this->repository->create($input);
    }

    public function update($id, $input)
    {
        return $this->repository->update($id, $input);
    }
}
