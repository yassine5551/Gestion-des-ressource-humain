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
        $this->middleware(["auth", 'admin']);
    }
    public function index()
    {
        $leaves = Leave::where("status", "accepted")->get();
        $employees = Employee::all();
        $title = "Admin - Congees";
        $types = Leave::$type;
        $ids =
            DB::table('users')
            ->rightJoin("employees", "users.id", '=', "employees.user_id")
            ->select(DB::raw("employees.id"))
            ->get();
        return view("admin.leave.index", compact("employees","title", "leaves", "ids", "types"));
    }
    public function store(Request $request)
    {
        Leave::Validate($request);
        Leave::create([
            "employee_id" => $request->employee_id,
            "status" => "accepted",
            "type" => $request->type,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at
        ]);
        return back()->with("success_msg", "le congé est ajouté avec success }");
    }


    public function demande()
    {
        $title = "Admin - Demande Congee";
        $leaves = Leave::all();


        return view('admin.leave.request', compact('leaves', 'title'));
    }
    public function accepteLeave($id)
    {
        $leave = Leave::find($id);
        $leave->setStatus('accepted');
        $leave->save();
        return back()->with("success_msg", "le congé a été accepter avec success ");
    }

    public function refuseLeave($id)
    {
        $leave = Leave::find($id);
        $leave->setStatus('rejected');
        $leave->save();
        return back()->with("success_msg", "le congé a été refuser avec success ");
    }
}
