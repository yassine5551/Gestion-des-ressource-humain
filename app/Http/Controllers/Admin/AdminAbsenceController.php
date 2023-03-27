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
    static     $raisons = [
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
        $current_month = Carbon::today()->month;
        $current_year = Carbon::today()->year;
        $raisons = self::$raisons;
        $createDate = fn($date)=>\Carbon\Carbon::createFromFormat("Y-m-d",$date);
        return view("admin.absence.index",compact("title","employees","daysInCurrentMonth","current_month","raisons","current_year","createDate"));
    }
    public function create()
    {

        $title = "Admin - Crier Absence";



    }

    public function store(Request $request){
        Absence::Validate($request);
        Absence::create([
            "employee_number"=>$request->employee_number,
            "date"=>$request->date,
            "raison"=>$request->raison,
            "description"=>$request->description
        ]);
        return back();
    }
}
