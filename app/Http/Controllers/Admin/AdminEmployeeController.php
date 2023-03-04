<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth",'admin']);
    }
    public function index()
    {
        $title =  "Admin - Employes";
        return view("employee.index",compact("title"));
    }
    public function create()
    {
        $title = "Admin - Ajouter un Employes";
        return view("employee.create",compact("title"));
    }
}
