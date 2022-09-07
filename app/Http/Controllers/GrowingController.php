<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrowingController extends Controller
{
    public function index()
    {
        return view('growing.index');
    }
}
