<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Http\Support\Facades\Auth;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index');
    }
    
    public function checkout()
    {
        return view('web.checkout');
    }
}
