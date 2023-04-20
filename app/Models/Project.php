<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ["name", "start_at", "end_at", "description"];
    public function getName()
    {
        return $this->attributes["name"];
    }
    public function getId()
    {
        return $this->attributes["id"];
    }
    public function getDescription()
    {
        return $this->attributes["description"];
    }
    public function getStartAt()
    {
        return $this->attributes["start_at"];
    }

    public function getEndAt()
    {
        return $this->attributes["end_at"];
    }
    public function team()
    {
        return $this->hasOne(Team::class);
    }

    public static function validate(Request  $request)
    {
        $request->validate([
            "name" => 'required',
            "start_at" => ["required"],
            "end_at" => ["required"],
        ]);
    }
}
