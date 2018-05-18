<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $status = ["未着手", "実行中", "完了"];
        
        return view('tasks.index', [
                'tasks' => $tasks,
                'status' => $status
            ]);
    }
    
    public function show($id)
    {
        $task = Task::find($id);
        $status = ["未着手", "実行中", "完了"];
        
        return view('tasks.show', [
                'task' => $task,
                'status' => $status
            ]);
    }
    
    public function create()
    {
        $task = new task;
        $status = ["未着手", "実行中", "完了"];
        
        return view('tasks.create', [
                'task' => $task,
                'status' => $status
            ]);
    }
        
    public function store(Request $request)
    {
        $this->validate($request, [
                'content' => 'required|max:191',
                'status' => 'required|max:10',
            ]);
            
        $task = new task;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();

        return redirect('/');
    }
    
    public function edit($id)
    {
        $task = task::find($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'content' => 'required|max:191',
                'status' => 'required|max:10',
            ]);
            
        $task = task::find($id);
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();

        return redirect('/');
    }
    
    public function destroy(Request $request, $id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/');
    }
}
