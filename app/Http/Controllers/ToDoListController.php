<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDoList;

class ToDoListController extends Controller
{
    public function index()
    {
        $tasks = ToDoList::all();
        return view('index', compact('tasks'));
    }

    public function store(Request $request)
    {
        ToDoList::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->has('status') ? 'non-pending' : 'pending',
            // 'created_by' => auth()->id() ?? null,
        ]);

        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = ToDoList::findOrFail($id);
        return view('edit', compact('task'));
    }


    public function update(Request $request, ToDoList $id)
    {
        // dd($request->all());
        // dd($task);
        $id->update([
            'status' => $request->input('status'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy(ToDoList $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
