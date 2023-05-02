<?php

namespace App\Http\Controllers\Employe;

use App\Models\Admin;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Rules\IsTruePassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeSettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware("employee");
    }

    public function change_password_index()
    {
        $title = "Employee - Changer votre mot de passe";


        return view('employe.settings.changepassword', compact('title'));
    }

    public function change_password_store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => ['required', new IsTruePassword($user->password)],
            'password' => 'required|confirmed',
        ]);
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with("success_msg", "Votre mot de passe a été changer avec succes");
    }
}
