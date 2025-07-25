<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardSiswaController extends Controller
{
    public function index(): View
    {
        return view('mobile.dashboard');
    }
}
