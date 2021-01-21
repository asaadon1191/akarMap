<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function DashBoard()
    {
        return \view('admin.dashBoard');
    }


    public function logout()
    {

    }
}
