<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->name;
        $tasks = DB::table('tasks')->where('user_name', '=', $user)->where('status', false)->oldest('due_date')->get();
        $comp_tasks = DB::table('tasks')->where('user_name', '=', $user)->where('status', true)->oldest('due_date')->get();
        $url=DB::table('images')->where('users_name',$user)->value('path');
        $rooms = Room::where('user_name', '=', $user)->first();
        return view ('home',compact('tasks','comp_tasks','url','rooms'));
    }
}
