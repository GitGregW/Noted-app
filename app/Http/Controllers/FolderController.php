<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;

class FolderController extends Controller
{
    public function index(){
        return view('folders.index', ['folders' => Auth::user()->folders()->get()]);
    }

    public function create(){
        return view('folders.create');
    }

    public function store(Request $request){
        $folder = request()->validate([
            'name' => 'required'
        ]);
        $folder['user_id'] = Auth::user()->id;
        $folder['slug'] = '';

        if($request->wantsJson()){
            return ['message' => $folder->path()];
        }

        Auth::user()->folders()->create($folder);

        return redirect('/folders');
    }

    public function edit(Folder $folder)
    {
        return view('folders.edit', compact('folder'));
    }
    
    public function update(Folder $folder)
    {
        $attributes = request()->validate(['name' => 'required']);

        $folder->update($attributes);

        return redirect($folder->path());
    }

    public function show(Folder $folder){
        if(Auth::user()->isNot($folder->user)){
            abort(403);
        }
        return view('folders.show', compact('folder'));
    }
}
