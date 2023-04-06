<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    public function index(){
        $title = "Employee - Dashboard";
        $types = Leave::$type;

        return view('employe.leave.index',compact('title', 'types'));
    }

}
