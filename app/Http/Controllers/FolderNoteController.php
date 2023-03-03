<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;
use App\Models\Note;

class FolderNoteController extends Controller
{
    public function create(Folder $folder)
    {
        return view('notes.create', compact('folder'));
    }

    public function store(Folder $folder)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $attributes['user_id'] = Auth::user()->id;

        $folder->addNote($attributes);

        return redirect($folder->path());
    }

    public function edit(Folder $folder, Note $note)
    {
        return view('notes.edit', compact(['folder','note']));
    }
    
    public function update(Folder $folder, Note $note)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $note->update($attributes);

        return redirect($folder->path());
    }
}
