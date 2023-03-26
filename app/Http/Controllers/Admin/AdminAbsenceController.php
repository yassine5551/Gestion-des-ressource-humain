<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Employee;
use Carbon\Carbon;
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
        $daysInCurrentMonth = Carbon::now()->daysInMonth;
        $employees = Employee::all();
        return view("admin.absence.index",compact("title","employees","daysInCurrentMonth"));
    }
    public function create()
    {

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


    }

    public function store(Request $request){
        Absence::validation($request);
        Absence::create($request->all());
        return back();
    }
}
