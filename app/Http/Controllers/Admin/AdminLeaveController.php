<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth",'admin']);
    }
    public function index()
    {
        $leaves = Leave::all();
        $employees = Employee::all();
        $social_numbers =
            DB::table('users')
            ->rightJoin("employees","users.id",'=',"employees.user_id")
            ->select(DB::raw("employees.social_number"))
            ->get();
        return view("admin.leave.index",compact("employees","leaves","social_numbers"));
    }
    public function store(Request $request)
    {
        Leave::Validate($request);
        Leave::create($request->only('social_number','start_at','end_at'));
        return back()->with("success_msg","le congée est ajoute avec success }");
    }


    public function demande(){
        $title = "Admin - Demande Congee";
        $leaves = Leave::all();


        return view('admin.leave.request',compact('leaves' , 'title'));
    }
    public function accepteLeave($id){
        $leave = Leave::find($id);
        $leave->setStatus('accepted');
        $leave->save();
        return back()->with("success_msg","le congée a Etait Accepte avec success ");

    }

    public function refuseLeave($id){
        $leave = Leave::find($id);
        $leave->setStatus('rejected');
        $leave->save();
        return back()->with("success_msg","le congée a Etait Refuser avec success ");
    }


}


