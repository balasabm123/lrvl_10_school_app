<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{


    function dasboard(){ 
        return view('backend.dashboard');
    }
}
