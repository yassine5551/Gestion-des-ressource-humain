<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAbsenceController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth",'admin']);
    }
    //
    public function index()
    {
        $title = "Admin - Absence";
        return view("admin.absence.index",compact("title"));
    }
    public function create()
    {
        $title = "Admin - Crier Absence";
        return view("admin.absence.create",compact("title"));
    }
}
