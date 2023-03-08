<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;

class Absence extends Model
{
    use HasFactory;
    protected $fillable=["employee_number","date_start","date_end","raison"];

    public function getEmployeeNumber(){
        return $this ->attributes["employee_number"];
    }
    public function setEmplyeeNumber($nbr){
        $this ->attributes["employee_number"]=$nbr;
    }

    public function getDateStart(){
        return $this ->attributes["date_start"];
    }
    public function setDateStart($nbr){
        $this ->attributes["date_start"]=$nbr;
    }

    public function getDateEnd(){
        return $this ->attributes["date_end"];
    }
    public function setDateEnd($nbr){
        $this ->attributes["date_end"]=$nbr;
    }

    public function getRaison(){
        return $this ->attributes["raison"];
    }
    public function setRaison($nbr){
        $this ->attributes["raison"]=$nbr;
    }

    public function getDescription(){
        return $this ->attributes["raison"];
    }
    public function setDescription($nbr){
        $this ->attributes["description"]=$nbr;
    }

    public function employee(){
        return $this->belongsTo(Employee::class,"employee_number","social_number");
    }
    public static function validation(Request $request){
        $request->validate([
            "employee_number"=>["required","exists:employees,social_number"],
            "date_start"=>["required","date"],
            "date_end"=>["required","date"],
            "raison"=>["required"],
            "description"=>["max:100"]
        ]);
    }
}
