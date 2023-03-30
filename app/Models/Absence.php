<?php

namespace App\Models;

use App\Rules\inaceptAbsenceInLeave;
use App\Rules\notSunday;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absence extends Model
{
    use HasFactory;
    protected $fillable = ['employee_number',"raison","date","description"];
    public function employee()
    {
        return $this->belongsTo(Employee::class,"employee_number");
    }

    public static function   Validate(Request $request){
        $emp = Employee::where("social_number",$request->employee_number)->first();
$request->validate([
    'employee_number' =>"required|exists:employees,social_number",
    "date"=>["date","before_or_equal:today",
        new notSunday(),"unique:absences,date"
        ,new inaceptAbsenceInLeave($emp),
        "after:{$emp->getHiringDate()}"],
    "raison"=>"required"
],[
    "unique"=>"absence already daclared for this date",
    "after"=>"we cannot declare an absence before hiring date"
]);
    }
}
