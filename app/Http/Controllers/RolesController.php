<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class RolesController extends Controller
{
    //

    public function index()
    {
        if (Auth::user()) {
            response()->view("");
        } else {
            response()->redirectTo("");
        }
    }
}
