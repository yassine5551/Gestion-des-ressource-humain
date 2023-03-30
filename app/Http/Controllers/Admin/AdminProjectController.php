<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminProjectController extends Controller
{
    public function index()
    {
        $title = "Admin - Projects";
        $projects = Project::all();

        return view("admin.project.index",compact("title","projects"));

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
            'description' =>$request->input('description')
        ]);
        return back()->with("success_msg","le projet est ajouté avec success");
    }

}
