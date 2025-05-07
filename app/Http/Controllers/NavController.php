<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function showDashboardForm()
    {
        return view('dashboard');
    }
}
