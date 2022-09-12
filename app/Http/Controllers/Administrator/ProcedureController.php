<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcedureController extends Controller
{
    public function index()
    {
        return view("administrator.procedure.index");
    }

    public function form()
    {
        return view("administrator.procedure.form");
    }
}
