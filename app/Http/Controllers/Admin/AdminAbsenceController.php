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
        "Obligations juridiques ou administratives",
        "other"
    ];
    public function __construct()
    {
        $this->middleware(["auth",'admin']);
    }
    //
    public function index(Request $request)
    {
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
    $months[] = Carbon::create(null, $i, 1)->format('F');
}

        $title = "Admin - Absence";
        $date = Carbon::today();
        if($request->query("year")&&$request->query("month"))
        {
            $year = $request->query("year");
            $month = $request->query("month");
            $date = \Carbon\Carbon::createFromFormat("Y-F-d",$year."-".$month."-"."01");
        }
        $daysInCurrentMonth = $date->daysInMonth;
        $employees = Employee::all();
        $current_month = $date->month;
        $current_year = $date->year;
        $raisons = self::$raisons;
        $CompanyBornYear = 2019;
        $years = [];
        for($item=Carbon::now()->format("Y")-$CompanyBornYear;$item>=0;$item--)
        {
            $years[] = Carbon::now()->format("Y")-$item;

        }
        $createDate = fn($date)=>\Carbon\Carbon::createFromFormat("Y-m-d",$date);
        return view("admin.absence.index",compact("title","employees","daysInCurrentMonth","current_month","raisons","current_year","createDate","months","years","date"));
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
        return back()->with("success_msg","l'absence est ajouter avec success");
    }
}
