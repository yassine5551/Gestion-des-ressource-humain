<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth", 'admin']);
    }
    public function index()
    {
        $title =  "Admin - Employes";
        $employees = Employee::all();
        $posts = Post::all();
        return view("admin.employee.index", compact("title", "employees", "posts"));
    }
    public function create()
    {
        $title = "Admin - Ajouter un Employes";
        $posts = Post::all();
        return view("admin.employee.create", compact("title",  "posts"));
    }
    public  function store(Request $request)
    {
        $request->validate([
            "email" => ["required", "unique:users,email"],
            "first_name" => ["required"],
            "last_name" => ["required"],
            "cin" => ["required", "unique:employees,cin",],
            "post_id" => ["required"],
            "salary" => ["required", "regex:/^\d{1,5}(\.\d{1,4})?$/"],
            "adress" => ["required"],
            "phone" => ["required"],
            "born_date" => ["required", "before:tomorrow"],
            "hiring_date" => ["required"]

        ]);
        $user = new User();
        $user->setFirstName($request->input("first_name"));
        $user->setLastName($request->input("last_name"));
        $user->setEmail($request->input("email"));
        $user->setPassword($request->input("cin"));
        $user->save();
        Employee::create([
            "cin" => $request->input("cin"),
            "user_id" => $user->getId(),
            "post_id" => $request->input("post_id"),
            "salary" => $request->input("salary"),
            "adress" => $request->input("adress"),
            "phone" => $request->input("phone"),
            "born_date" => $request->input("born_date"),
            "hiring_date" => $request->input("hiring_date")
        ]);
        return back()->with("success_msg", "l'employé est ajouté avec success");
    }
    public function delete($id)
    {
        Employee::find($id)->delete();
        return back()->with("success_msg", "l'employé est supprimé avec success");
    }
}
