<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ["name","description"];
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
    public function stagiaires()
    {
        return $this->hasMany(Stagiaire::class,);
    }
    public static function validate(Request  $request)
    {
        $request->validate([
            "name" =>'required'
        ]);
    }
}
