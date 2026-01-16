<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini;

class TripController extends Controller
{
    public function create()
    {
        return view('create-trip');
    }
}
