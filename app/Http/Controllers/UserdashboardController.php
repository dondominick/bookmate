<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserdashboardController extends Controller
{

    public function index()
    {

        return view('user.userdashboard');
    }


    public function borrowedbooks()
    {
        return view('user.userborrowbook');
    }

    public function returnbooks()
    {
        return view('user.userreturnbook');
    }
}
