<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicPagesController extends Controller
{
    public function start() {
    	return view('start');
    }

    public function about() {
    	return view('about');
    }
}
