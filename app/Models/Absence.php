<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $fillable = ['employee_number',"raison","date","description"];
    public function employee()
    {
        return $this->belongsTo(Employee::class,"employee_number");
    }
}
