<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Room;

class RoomComposer
{
    public function __construct()
    {
        $user = Auth::user()->name;
        $this->room = Room::where('user_name', '=', $user)->get();
    }
    public function compose(View $view)
    {
        $view -> with('room',$this->room);
    }
}