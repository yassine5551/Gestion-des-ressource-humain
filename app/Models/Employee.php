<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends model
{
    use HasFactory;
    protected $fillable =
    [
        "cin",
        "user_id",
        "post_id",
        "salary",
        "adress",
        "phone",
        "born_date",
        "hiring_date"
    ];
    protected $table = 'employees';
    public function getCin()
    {
        return $this->attributes["cin"];
    }
    public function getId()
    {
        return $this->attributes["id"];
    }
    public static function validation(Request $request)
    {
        $request->validate([
            "cin" => ["required", "unique:employees,cin"],
            "post_id" => ["required"],
            "salary" => ["required", "regex:/^\d{1,5}(\.\d{1,4})?$/"],
            "adress" => ["required"],
            "phone" => ["required"],
            "born_date" => ["required", "before:tomorrow"],
            "hiring_date" => ["required"]
        ]);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getSalary()
    {
        return $this->attributes["salary"];
    }

    public function setSalary($salary)
    {
        $this->attributes["salary"] = $salary;
    }
    public function getBornDate()
    {
        return $this->attributes["born_date"];
    }
    public function setBornDate($date)
    {
        $this->attributes["born_date"] = $date;
    }
    public function getHiringDate()
    {
        return $this->attributes["hiring_date"];
    }
    public function setHuringDate($date)
    {
        $this->attributes["hiring_date"] = $date;
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
    public function setPhone($phone)
    {
        $this->attributes["phone"] = $phone;
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function members()
    {
        return $this->hasMany(Member::class);
    }
    public function getProjects()
    {
        $projects = [];
        $members = $this->members;
        foreach ($members as $member) {
            $projects[] = $member->team->project->id;
        }
        return $projects;
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
    public function inHoliday()
    {
        $leave = Leave::where('employee_id', $this->getId())
            ->where("start_at", '<=', now())
            ->where("end_at", ">=", now())->exists();
        if ($leave) {
            return true;
        }
        return false;
    }
    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
    public function isAbsentInThisDay(string $date): bool
    {
        $absence = Absence::where("employee_id", $this->getId())
            ->where("date", $date)
            ->exists();
        if ($absence) {
            return true;
        }
        return  false;
    }
    public function hasLeaveInThisDay(string $date)
    {
        $leave =
            DB::table("leaves")->where("id", $this->getId())
            ->where("start_at", "<=", $date)
            ->where("end_at", ">=", $date)
            ->where("status", "accepted")
            ->exists();
        if ($leave) {
            return  true;
        }
        return  false;
    }
}
