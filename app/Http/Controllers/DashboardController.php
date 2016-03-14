<?php

namespace App\Http\Controllers;

use App\ArtefactType;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    //

    public function getAllArtefactTypes()
    {
        if (Auth::user()) {
            $artefacts = ArtefactType::where('artefacttypepid', 0)->where('active',true)
                ->orderBy('sequencenumber','ASC')
                ->get();
            return response()->json($artefacts);
        } else {
            response()->redirectTo("");
        }

    }
}
