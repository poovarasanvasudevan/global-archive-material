<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use DBHelpers;
use Hash;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Response;
use View;

class IndexController extends Controller
{
    //
    public function goIndex()
    {
        if (!Auth::check()) {
            return response()->view("welcome");
        } else {
            return response()->redirectTo("dashboard");
        }
    }

    public function goDashboard()
    {
        if (Auth::check()) {
            return response()->view("dashboard");
        } else {
            return response()->redirectTo("");
        }
    }

    public function loginValidate($username, $password)
    {

        $user = User::where(['abhyasiid' => $username, "password" => md5($password)])->get();

        if ($user->count() == 1) {
            $user = $user->first();
            //dd($user->id);
            Auth::loginUsingId($user->id);

            return response()->json(DBHelpers::success());
        } else {
            return response()->json(DBHelpers::failure());
        }

    }

    public function logout()
    {

        Auth::logout();

        response()->redirectTo("");

    }

    public function goUser()
    {
        if (Auth::check()) {

            return response()->view("user");
        } else {
            return response()->redirectTo("");
        }
    }
}
