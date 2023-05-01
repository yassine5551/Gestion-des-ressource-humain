<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Project;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth", 'admin']);
    }
    public function index()
    {
        $title = "Admin - Dashboard";
        $employees_count = Employee::all()->count();
        $stagiaire_count = Stagiaire::all()->count();
        $this_month_absences = Absence::whereRaw("Month(date)=?",[now()->month])->get();
        $this_month_leaves = Leave::whereRaw("Month(start_at)=?",[now()->month])->where("status","accepted")->get(); 
        $project_count = Project::all()->count();
        $chartData = DB::table("posts")
            ->leftJoin("employees", "posts.id", "=", "employees.post_id")
            ->groupBy("employees.post_id", "posts.name")
            ->select("posts.name", DB::raw("count(employees.id) as count"))
            ->having("count", ">", 0)
            ->orderBy("count")
            ->get();
        return view("admin.index", compact("title", "chartData",'this_month_leaves',"project_count","this_month_absences", "stagiaire_count","employees_count"));
    }
}
