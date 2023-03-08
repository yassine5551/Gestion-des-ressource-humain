<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAbsenceController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth",'admin']);
    }
    //
    public function index()
    {
        $title = "Admin - Absence";
        return view("admin.absence.index",compact("title"));
    }
    public function create()
    {
        $employees = DB::table('employees')
        ->leftJoin("users","employees.user_id","=","users.id")
        ->select(DB::raw("concat(users.first_name,' ',users.last_name) as full_name"),"employees.social_number")
        ->get();
        $title = "Admin - Crier Absence";
        $raisons = [
            "Maladie ou blessure",
            "Soins à un membre de la famille malade",
            "Rendez-vous médicaux",
            "Accidents de la route ou problèmes de transport",
            "Décès d'un membre de la famille ou d'un ami proche",
            "Vacances ou congés annuels",
            "Formation professionnelle ou universitaire",
            "Congé de maternité ou de paternité",
            "Grèves ou manifestations",
            "Obligations juridiques ou administratives"
        ];
        return view("admin.absence.create",compact("title","employees","raisons"));


    }
}
