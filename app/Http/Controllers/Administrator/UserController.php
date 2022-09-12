<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view("administrator.user.index");
    }

    public function form()
    {
        return view("administrator.user.form");
    }
}
