<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
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
        $chartData = DB::table("posts")
            ->leftJoin("employees", "posts.id", "=", "employees.post_id")
            ->groupBy("employees.post_id", "posts.name")
            ->select("posts.name", DB::raw("count(employees.id) as count"))
            ->having("count", ">", 0)
            ->orderBy("count")
            ->get();
        return view("admin.index", compact("title", "chartData", "employees_count"));
    }
}
