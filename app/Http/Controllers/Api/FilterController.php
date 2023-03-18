<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function filter_by_post($id)
    {
        if($id != -1)
        {
            $employers = DB::table("users")
                ->rightJoin("employees","users.id","=","employees.user_id")
                ->rightJoin("posts","employees.post_id","=","posts.id")
                ->where("employees.post_id",$id)
                ->select("employees.social_number","posts.name as post_name"
                   ,"users.first_name","users.last_name","employees.salary","employees.hiring_date")->get();
        }
        else{
            $employers = DB::table("users")
            ->rightJoin("employees","users.id","=","employees.user_id")
            ->rightJoin("posts","employees.post_id","=","posts.id")
            ->select("employees.social_number","posts.name as post_name",
               "users.first_name","users.last_name","employees.salary","employees.hiring_date")->get();
        }
        return response()->json(["employers"=>$employers]);
        }
}
