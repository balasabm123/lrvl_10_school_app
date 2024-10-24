<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dummpApi extends Controller
{
    function getdata(){ 
        return ["name"=>"Mayur","email"=>"Mayur332@gmail.com"];
    }
}
