<?php

namespace App\Models;

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
$request->validate([
    'employee_number' =>"required|exists:employees,social_number",
    "date"=>"date|before_or_equal:today",
    "raison"=>"required"
]);
    }
}
