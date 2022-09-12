<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view("administrator.company.index");
    }

    public function form()
    {
        return view("administrator.company.form");
    }
}
