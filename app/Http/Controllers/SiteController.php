<?php
/**
 * Created by PhpStorm.
 * User: OnyxzeD
 * Date: 18/08/2015
 * Time: 11:35
 */
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function jawab($name)
    {
//        return 'Welcome : '.$name;
        return view('greeting', ['name' => $name]);
    }
}