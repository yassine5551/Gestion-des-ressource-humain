<?php

namespace App\Http\Controllers\Employe;

use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeLeaveController extends Controller
{
    public function index(){
        $title = "Employee - Dashboard";
        $types = Leave::$type;

        return view('employe.leave.index',compact('title', 'types'));
    }

    public function store(Request $request ){
        Leave::Validate($request);
        Leave::create(
           [ "social_number"=>Employee::where('user_id' , Auth::id())->first()->getSocialNumber(),
            "status" =>'',
            "type",
            'start_at',
            'end_at'
             ]  );

        

    }

}
