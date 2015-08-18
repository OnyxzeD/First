<?php
/**
 * Created by PhpStorm.
 * User: OnyxzeD
 * Date: 18/08/2015
 * Time: 14:33
 */

namespace App\Http\Controllers\Guest;


use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return 'Selamat Datang Guest';
    }
}