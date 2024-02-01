<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;

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
        $note = Note::create($request->validated());
        $note->user_id = auth()->id();

        return NoteResource::make($note);

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
        $note->user_id = auth()->id();

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
