<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;
use App\Models\Task;

class FolderTaskController extends Controller
{
    public function create(Folder $folder){
        return view('tasks.create', compact('folder'));
    }

    public function store(Folder $folder){
        $attributes = request()->validate([
            'body' => 'required'
        ]);
        $attributes["user_id"] = Auth::user()->id;
        $folder->addTask($attributes);

        return redirect($folder->path());
    }

    public function edit(Folder $folder, Task $task){
        return view('tasks.edit', compact(['folder','task']));
    }

    public function update(Folder $folder, Task $task)
    {
        $attributes = request()->validate([
            'body' => 'required'
        ]);

        $task->update($attributes);

        return redirect($folder->path());
    }

    public function complete(Folder $folder, Task $task){
        
        // Auth::user()->tasks($task);
        $folder->completeTask($task);

        return redirect($folder->path());
    }
}
