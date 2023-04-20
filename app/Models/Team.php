<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    public function getId()
    {
        return $this->attributes["id"];
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
