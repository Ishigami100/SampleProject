<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item_user;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class ListWallController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user()->name;
        $walls = Item_user::where('username', '=', $user)
                            ->where('flag', '=', true)
                            ->where('furnitureID', '=', 4)
                            ->get();
        $rooms = Room::where('user_name', '=', $user)->first();
        return view('growing.wall',compact('rooms','walls'));
    }
    public function update(Request $request)
    {
        $user = Auth::user()->name;
        $rooms = Room::where('user_name', '=', $user)->first();

        $rooms->wall = $request->itemID;
        $rooms->save();

        return redirect('/growing/furniture_kind_select/wall');
    }
}