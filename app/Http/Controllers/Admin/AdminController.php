<?php
/**
 * Created by PhpStorm.
 * User: OnyxzeD
 * Date: 18/08/2015
 * Time: 14:29
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return 'Selamat Datang Admin';
    }
}