<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Note;

class NoteController extends Controller
{
    public function index(){
        return view('notes.index', ['notes' => Auth::user()->notes()->get()]);
    }

    public function create(){
        return view('notes.create');
    }

    public function store(Request $request){
        $attributes = request()->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        Auth::user()->notes()->create($attributes);
        return redirect('/notes');
    }

    public function show(Note $note){
        if(Auth::user()->isNot($note->user)){
            abort(403);
        }
        return view('notes.show', compact('note'));
    }
}
