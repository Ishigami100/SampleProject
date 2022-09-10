<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class FurnitureRoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user()->name;
        $rooms = Room::where('user_name', '=', $user)->first();
        return view('growing.furniture_kind_select',compact('rooms'));
    }
}
