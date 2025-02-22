<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('back_office.dashboard_home',compact('var'));
    }

    
}
