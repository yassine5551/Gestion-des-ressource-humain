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
        $viewData["title"] = "Admin - Dashboard";
        return view("admin.index",compact("viewData"));
    }
}
