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
    protected $fillable = ['employee_id', "raison", "date", "description"];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public static function   Validate(Request $request)
    {
        $emp = Employee::find($request->employee_id);
        $request->validate([
            'employee_id' => "required|exists:employees,id",
            "date" => [
                "required", "date", "before_or_equal:today",
                new notSunday(), "unique:absences,date", new inaceptAbsenceInLeave($emp),
                "after:{$emp->getHiringDate()}"
            ],
            "raison" => "required"
        ], [
            "unique" => "absence already daclared for this date",
            "after" => "we cannot declare an absence before hiring date"
        ]);
    }
}
