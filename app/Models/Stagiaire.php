<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Stagiaire extends Model
{
    use HasFactory;
    protected $fillable =
        [
        "first_name",
        "last_name",
        "email",
        "project_id",
        "date_debut",
        "date_fin",
        "status",
        "adress",
        "phone",
        "born_date",
            "link"
    ];

    public function getId()
    {
        return $this->attributes["id"];
    }
    public static function validation(Request $request)
    {
        $request->validate([
            "first_name"=>["required"],
            "last_name"=>["required"],
            "email"=>["required","email"],
            "project_id"=>["required","exists:projects,id"],
            "date_debut"=>["required","date"],
            "date_fin"=>["required","date","after:date_debut"],
            "adress"=>["required"],
            "phone"=>["required"],
            "born_date"=>["required","before:today"],
            "link"=>[""]

        ]);

    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function getFirstName()
    {
        return $this->attributes["first_name"];
    }
    public function setFirstName($fname)
    {
        $this->attributes["first_name"] = $fname;
    }



    public function getLastName()
    {
        return $this->attributes["last_name"];
    }
    public function setLastName($lname)
    {
        $this->attributes["last_name"] = $lname;
    }

    public function getEmail()
    {
        return $this->attributes["email"];
    }
    public function setEmail($email){
        $this->attributes["email"] = $email;

    }


    public function getDateDebut()
    {
        return $this->attributes["date_debut"];
    }
    public function setDateDebut($date)
    {
        $this->attributes["date_debut"] = $date;
    }



    public function getDateFin()
    {
        return $this->attributes["date_fin"];
    }
    public function setDateFin($date)
    {
        $this->attributes["date_fin"] = $date;
    }



    public function getStatus()
    {
        return $this->attributes["status"];
    }
    public function setStatus($status)
    {
        $this->attributes["status"] = $status;
    }


    public function getBornDate()
    {
        return $this->attributes["born_date"];
    }
    public function setBornDate($date)
    {
        $this->attributes["born_date"] = $date;
    }



    public function getPhoneNumber()
    {
        return $this->attributes["phone"];
    }
    public function setPhoneNumber($phone)
    {
        $this->attributes["phone"] = $phone;
    }


    public  function getAdress()
    {
        return $this->attributes["adress"];
    }
    public function setAdress($adress)
    {
        $this->attributes["adress"] = $adress;
    }

}
