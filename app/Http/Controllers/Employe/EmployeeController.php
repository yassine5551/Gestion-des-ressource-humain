<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth",'employee']);
    }
    public function index()
    {
        $title = "Employee - Dashboard";
       
        return view("employe.index",compact("title"));
    }

    public function profile(){
        $title = "Employee - Profile";

        return view("employe.profile.index",compact("title"));
    }
}
