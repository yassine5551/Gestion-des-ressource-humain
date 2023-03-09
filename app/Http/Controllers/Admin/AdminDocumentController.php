<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminDocumentController extends Controller
{
    //
    public function employeeListe(){
        $employees=DB::table("employees")->leftJoin("users","employees.user_id","=","users.id")
        ->leftJoin("posts","employees.post_id","=","posts.id")
        ->select("employees.social_number","users.first_name","users.last_name","employees.born_date",
        "posts.name","employees.salary","employees.hiring_date")
        ->get();
        $pdf=FacadePdf::loadView("admin.document.employees" ,compact("employees"));
        return $pdf->download("liste Des Employees.pdf");
    }
}
