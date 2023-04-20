<?php

namespace App\Http\Controllers\Employe;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth", 'employee']);
    }
    public function index()
    {
        $title = "Employee - Dashboard";

        return view("employe.index", compact("title"));
    }

    public function profile()
    {
        $title = "Employee - Profile";

        $employee =  Employee::where('user_id', Auth::id())->first();

        return view("employe.profile.index", compact("title", 'employee'));
    }
}
