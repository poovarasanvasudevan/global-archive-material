<?php

namespace App\Http\Controllers;

use App\Location;
use App\User;
use Auth;
use DBHelpers;
use Illuminate\Http\Request;

use App\Http\Requests;
use Kodeine\Acl\Models\Eloquent\Permission;

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

    public function resetPassword($id)
    {
        if (Auth::check()) {
            $user = User::find($id);

            if ($user) {
                $user->password = env("DEFAULT_PASSWORD");
                return response()->json(DBHelpers::success());
            } else {
                response()->json(DBHelpers::failure());
            }
        } else {
            return response()->redirectTo("");
        }
    }

    public function editUser($id)
    {
        if (Auth::check()) {

            if (is_int(intval($id))) {
                $user = User::find($id);

                if ($user != null) {
                    $location = Location::find($user->location);
                    $allPermission = Permission::all();
                    return response()->view('edituser', array(
                        "user" => $user,
                        "location" => $location,
                        "allpermission" => $allPermission,
                    ));
                } else
                    return response()->view('edituser', array("user" => null));

            } else {
                return response()->view('edituser', array("user" => null));
            }
        } else {
            return response()->redirectTo("");
        }
    }

    public function assignPermission($userid, $key, $name)
    {
        $user = User::find($userid);
        if ($user->assignPermission('user',false)) {
            return response()->json(DBHelpers::success());
        } else {
            return response()->json(DBHelpers::failure());
        }
    }


}
