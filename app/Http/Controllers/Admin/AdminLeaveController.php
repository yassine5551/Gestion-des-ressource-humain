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
        $employees = DB::table('users')
            ->rightJoin("employees","users.id",'=',"employees.user_id")
        ->select(DB::raw("concat(users.first_name,' ',users.last_name) as full_name"),"employees.social_number")
        ->get();
        return view("admin.leave.index",compact("employees"));
    }
    public function store(Request $request)
    {
        Leave::Validate($request);
        Leave::create($request->only('social_number','start_at','end_at'));
        return back();
    }
}
