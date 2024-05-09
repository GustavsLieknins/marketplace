<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index() {
        $users = User::all();
        
        return view("superadmin", ["users" => $users]);
    }

    public function findUser(Request $request) {

        $user = User::find($request->user_id);


        return view("superadmin", ["user" => $user]);
    }

    public function roleChange(Request $request) {

        $user = User::find($request->user_id);
        if($request->has("user_role"))
        {
            $user->role = $request->user_role;
            $user->save();
                return back()->withInput($request->input());
        }

        return view("superadmin", ["user" => $user]);
    }

    public function userDelete(Request $request) {

        $user = User::find($request->user_id);
        $user->delete();

        $users = User::all();
        return view("superadmin", ["users" => $users]);
    }
}