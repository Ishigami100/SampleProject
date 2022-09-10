<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Money;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->name;
        $tasks = Task::where('user_name', '=', $user)->where('status', false)->oldest('due_date')->get();
        return view ('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'task_name' => 'required|max:100'
        ];
        $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];
        Validator::make($request->all(), $rules, $messages)->validate();

        $task = new Task;
        $user = Auth::user()->name;
        $task->user_name = $user;
        $task->name = $request->input('task_name');
        $task->due_date = $request->input('task_due_date');
        $task->save();
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->status === null){
            $rules = [
                'task_name' => 'required|max:100',
            ];

            $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください'];

            Validator::make($request->all(), $rules, $messages)->validate();

            $task = Task::find($id);

            $task->name = $request->input('task_name');
            $task->due_date = $request->input('task_due_date');

            $task->save();
        }else{
            $task = Task::find($id);

            $task->status = true;

            $task->save();
            $user = Auth::user()->name;
            $num=Money::where('username', '=', $user)->first()->number;

            Money::where('username', '=',$user)->update([
                'username' =>$user,
                'number'=>$num+1,
            ]);
        }

        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();

        return redirect('/tasks');
    }
}
