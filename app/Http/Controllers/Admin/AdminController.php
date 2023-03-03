<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth",'admin']);
    }
    public function index()
    {
        $title = "Admin - Dashboard";
        return view("admin.index",compact("title"));
    }
    public function employes()
    {

        $title =  "Admin - Employes";
        return view("admin.employes",compact("title"));
    }
}
