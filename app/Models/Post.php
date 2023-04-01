<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ["departement_id","name"];
    public function getName()
    {
        return $this->attributes["name"];
    }
    public function getId()
    {
        return $this->attributes["id"];
    }
    public function employees()
    {
        return $this->hasMany(Employee::class,);
    }
    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
    public static function validate(Request  $request)
    {
        $request->validate([
            "departement_id"=>"required|exists:departements,id",
            "name" =>'required'
        ]);
    }
}
