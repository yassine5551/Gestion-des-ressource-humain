<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, SoftDeletes;
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
