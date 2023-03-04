<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ["name"];
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
        return $this->hasMany(Employee::class,"social_number");
    }
}
