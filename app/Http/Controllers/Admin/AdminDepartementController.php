<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;

class AdminDepartementController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth", "admin"]);
    }
    //
    public function index()
    {
        $departements = Departement::all();
        $title =  "Admin - Employes";
        return view("admin.departement.index", compact("departements", "title"));
    }

    public function store(Request $request)
    {
        Departement::validate($request);
        Departement::create([
            "name" => $request->input("name")
        ]);
        return back()->with("success_msg", "le departement est ajoute avec success");
    }
}
