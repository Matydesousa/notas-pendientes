<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendingRequest;
use App\Models\Pending;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pendings = Pending::all();

        return view('AdminLte.pending.index', compact('pendings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('AdminLte.pending.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PendingRequest $request): RedirectResponse
    {
        Pending::create($request->validated());

        return redirect()->route('pending.index')->with('success', 'Pendiente creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pending $pending): View
    {
        return view('AdminLte.pending.show', compact('pending'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pending $pending): View
    {
        return view('AdminLte.pending.edit', compact('pending'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PendingRequest $request, Pending $pending): RedirectResponse
    {
        $pending->update($request->validated());

        return redirect()->route('pending.index')->with('success', 'Pendiente actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pending $pending): RedirectResponse
    {
        $pending->delete();

        return redirect()->route('pending.index')->with('danger', 'Pendiente eliminado');
    }

    public function completed(): View
    {
        $pendings = Pending::where('completed', true)->get();

        return view('AdminLte.pending.completed', compact('pendings'));
    }

    public function pending(): View
    {
        $pendings = Pending::where('completed', false)->get();

        return view('AdminLte.pending.pending', compact('pendings'));
    }

    public function toggle(Pending $pending): RedirectResponse
    {
        $pending->update([
            'completed' => ! $pending->completed,
        ]);

        $message = $pending->completed ? 'Pendiente marcado como cumplido' : 'Pendiente marcado como no cumplido';

        return back()->with('success', $message);
    }
}
