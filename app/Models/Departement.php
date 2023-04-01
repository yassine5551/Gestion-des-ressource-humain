<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Departement extends Model
{
    use HasFactory;
    protected $fillable = ["name"];

    public function getId()
    {
        return $this->attributes["id"];
    }
    public function getName()
    {
        return $this->attributes["name"];
    }
    public function setName($name)
    {
        $this->attributes["name"];
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public static function validate(Request $request)
    {
        $request->validate([
            "name"=>"required"
        ]);
    }
}
