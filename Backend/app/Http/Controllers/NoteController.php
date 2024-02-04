<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return NoteResource::collection(Note::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {

        $request->validate([
            'note_title' => 'required|string',
            'note_content' => 'required|string',
        ]);
        $note = new Note([
            'note_title' => $request->note_title,
            'note_content' => $request->note_content,
        ]);
        Auth::user()->notes()->save($note);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return NoteResource::make($note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        $note->update($request->validated());

        return NoteResource::make($note);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return response()->noContent();
    }
}
