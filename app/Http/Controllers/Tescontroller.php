<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tescontroller extends Controller
{
    public function welcome()
    {
    	return view('welcome');
    }
}
 