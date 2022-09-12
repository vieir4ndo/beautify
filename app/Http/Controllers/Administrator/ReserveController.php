<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReserveController extends Controller
{
    public function index()
    {
        return view("administrator.reserve.index");
    }

    public function form()
    {
        return view("administrator.reserve.form");
    }
}
