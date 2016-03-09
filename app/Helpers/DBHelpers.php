<?php
/**
 * Created by PhpStorm.
 * User: HTCINDIA\poovarasanv
 * Date: 7/3/16
 * Time: 12:14 PM
 */

namespace App\Helpers;


use App\User;

class DBHelpers
{

    public static function isUserAvailable($abyasiId)
    {
        return User::where('abhyasiid', $abyasiId)->count();
    }

    public static function success()
    {
        return array("result" => true);
    }

    public static function failure()
    {
        return array("result" => false);
    }
}