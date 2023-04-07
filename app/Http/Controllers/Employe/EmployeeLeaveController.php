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
        $leaves= Employee::where('user_id' , Auth::id())->first()->leave;
        return view('employe.leave.index',compact('title', 'types' , 'leaves'));
    }

    public function store(Request $request ){
        Leave::Validate($request);
        Leave::create(
           [
            "social_number"=>Employee::where('user_id' , Auth::id())->first()->getSocialNumber(),
            "status" =>"pending",
            "type"=>$request->input('type'),
            'start_at'=>$request->input('start_at'),
            'end_at'=>$request->input('end_at')
             ]  );

        return back()->with("success_msg","le demand du congée est envoyer avec success }");

    }



}
