<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $notes = Note::all();

        return view('AdminLte.note.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('AdminLte.note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteRequest $request): RedirectResponse
    {
        Note::create($request->validated());

        return redirect()->route('note.index')->with('success', 'Nota creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note): View
    {
        return view('AdminLte.note.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note): View
    {
        return view('AdminLte.note.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoteRequest $request, Note $note): RedirectResponse
    {
        $note->update($request->validated());

        return redirect()->route('note.index')->with('success', 'Nota actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note): RedirectResponse
    {
        $note->delete();

        return redirect()->route('note.index')->with('danger', 'Nota eliminada');
    }
}
