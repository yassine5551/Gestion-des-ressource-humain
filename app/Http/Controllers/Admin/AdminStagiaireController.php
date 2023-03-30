<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class AdminStagiaireController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth",'admin']);
    }
    public function index()
    {
        $title =  "Admin - Stagiaires";
        $stagiaires = Stagiaire::all();
        return view("admin.stagiaire.index",compact("title","stagiaires"));
    }
    public function create()
    {
        $title = "Admin - Ajouter un Stagiaire";
        return view("admin.stagiaire.create",compact("title"));
    }
    public  function store(Request $request)
    {
        Stagiaire::validation($request);
        Stagiaire::create([
            "first_name"=>$request->input("first_name"),
            "last_name"=>$request->input("last_name"),
            "project"=>$request->input("project"),
            "date_debut"=>$request->input("date_debut"),
            "date_fin"=>$request->input("date_fin"),
            "status"=>$request->input("status"),
            "adress"=>$request->input("adress"),
            "phone"=>$request->input("phone"),
            "born_date"=>$request->input("born_date"),
        ]);
        return back()->with("success_msg","le stagiaire est ajouté avec success");
    }

    public function delete($id)
    {
        Stagiaire::destroy($id);
        return back()->with("success_msg","le stagiaire est supprimé avec success");
    }


}
