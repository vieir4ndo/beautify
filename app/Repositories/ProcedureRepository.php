<?php

namespace App\Repositories;

use App\Models\Procedure;

class ProcedureRepository
{
    public function create($input){
        return Procedure::create($input);
    }

    public function update(string $id, $input){
        return Procedure::where("id", $id)->update($input);
    }
}
