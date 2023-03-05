<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function filter_by_post($id)
    {
        $employers = DB::table("users")
            ->rightJoin("employees","users.id","=","employees.user_id")
            ->rightJoin("posts","employees.post_id","=","posts.id")
            ->select("employees.social_number","posts.name as post_name",
                DB::raw("concat(users.first_name,' ',users.last_name) as full_name"),"employees.salary","employees.hiring_date")->get();

        if($id !== -1)
        {
            $employers = DB::table("users")
                ->rightJoin("employees","users.id","=","employees.user_id")
                ->rightJoin("posts","employees.post_id","=","posts.id")
                ->where("employees.post_id",$id)
                ->select("employees.social_number","posts.name as post_name",
                    DB::raw("concat(users.first_name,' ',users.last_name) as full_name"),"employees.salary","employees.hiring_date")->get();
        }

        return response()->json(["employers"=>$employers]);
    }
}
