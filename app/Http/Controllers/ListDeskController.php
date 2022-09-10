<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item_user;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class ListDeskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user()->name;
        $desks = Item_user::where('username', '=', $user)
                            ->where('flag', '=', true)
                            ->where('furnitureID', '=', 2)
                            ->get();
        $rooms = Room::where('user_name', '=', $user)->first();
        return view('growing.desk',compact('rooms','desks'));
    }
    public function update(Request $request)
    {
        $user = Auth::user()->name;
        $rooms = Room::where('user_name', '=', $user)->first();

        $rooms->desk = $request->itemID;
        $rooms->save();

        return redirect('/growing/furniture_kind_select/desk');
    }
}
