<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    //

    public function indexDashboard(){
        return view('dashboard.home');
    }
}
