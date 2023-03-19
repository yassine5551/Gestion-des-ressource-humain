<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leave extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ["social_number",'start_at','end_at'];
    public static function Validate(\Illuminate\Http\Request $request)
    {
        $request->validate([
            "social_number"=>'required|exists:employees,social_number',
            'start_at'=>"required|date",
            "end_at"=>'required|date'
        ]);
    }
}
