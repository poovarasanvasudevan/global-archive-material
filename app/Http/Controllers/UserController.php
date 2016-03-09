<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    //

    public function createUser()
    {

    }

    public function getAllUser()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function deleteUser()
    {

    }

    public function fullDeleteUser()
    {

    }

    public function editUser($id)
    {
        if (Auth::check()) {

            if(is_int(intval($id))) {
                $user = User::find($id);

                if ($user != null)
                    return response()->view('edituser', array("user" => $user));
                else
                    return response()->view('edituser', array("user" => null));

            } else{
                return response()->view('edituser', array("user" => null));
            }
        } else {
            return response()->redirectTo("");
        }
    }
}
