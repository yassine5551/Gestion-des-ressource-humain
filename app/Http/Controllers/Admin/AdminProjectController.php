<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Models\Member;
use App\Models\Project;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class AdminProjectController extends Controller
{
    public function index()
    {
        $title = "Admin - Projects";
        $projects = Project::all();
        $employees = EmployeeResource::collection(Employee::all());

        return view("admin.project.index", compact("title", "projects", "employees"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Project::validate($request);
        Project::create([
            'name' => $request->input('name'),
            "start_at" => $request->input("start_at"),
            "end_at" => $request->input("end_at"),
            'description' => $request->input('description')
        ]);
        return back()->with("success_msg", "le projet est ajouté avec success");
    }
    public function createTeam(Request $request)
    {
        $request->validate([
            "employee_ids" => ["required"],
            "project_id" => ["required", "exists:projects,id"]
        ]);
        $team = Project::find($request->input("project_id"))->team;
        $members = $team->members ?? [];
        foreach ($members as $mb) {
            $mb->delete();
        }
        if (!$team) {

            $team = new Team();
            $team->project_id = $request->input('project_id');
            $team->save();
        }
        foreach ($request->employee_ids as $nbr_employee) {
            $employee = User::find($nbr_employee)->employee;
            $member = new Member();
            $member->employee_id = $employee->getId();
            $member->team_id = $team->id;
            $member->save();
        }

        return back()->with("success_msg", "l'équipe de travail est ajour avec success");;
    }
}
