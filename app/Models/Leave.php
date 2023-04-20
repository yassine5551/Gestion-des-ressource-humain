<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leave extends Model
{
    static $type = [
        "Congé de maladie",
        "Congé de maternité/paternité",
        "Congé pour raisons personnelles",
        " Congé de vacances",
        " Congé sans solde",
        " Congé de formation professionnelle",
        " Congé sabbatique"
    ];

    use HasFactory, SoftDeletes;
    protected $fillable = ["employee_id", "status", "type", 'start_at', 'end_at'];

    public static function Validate(\Illuminate\Http\Request $request)
    {
        $request->validate([

            'start_at' => "required|date",
            "end_at" => 'required|date',
            "type" => "required"
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function getStartAt()
    {
        return $this->attributes["start_at"];
    }
    public function getEndAt()
    {
        return $this->attributes["end_at"];
    }

    public function getStatus()
    {
        return $this->attributes["status"];
    }

    public function setStatus($status)
    {
        $this->attributes["status"] = $status;
    }

    public function setType($type)
    {
        $this->attributes["type"] = $type;
    }
    public function getType()
    {
        return $this->attributes["type"];
    }
    public function Days()

    {
        $datetime1 = new \DateTime($this->attributes["start_at"]);
        $datetime2 = new \DateTime($this->attributes["end_at"]);
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%a');
    }
    public function RestDays()

    {
        $datetime1 = new \DateTime(now());
        $datetime2 = new \DateTime($this->attributes["end_at"]);
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%a') + 1;
    }
}
