@extends('layouts.admin')

@section('page_title', 'Pendientes cumplidos')

@section('page_header')
    <h1>Pendientes cumplidos</h1>
@stop

@section('admin_content')
    <div class="admin-toolbar">
        <a href="{{ route('pending.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i>
            Todos
        </a>

        <a href="{{ route('pending.pending') }}" class="btn btn-warning">
            <i class="fas fa-clock mr-1"></i>
            Por cumplir
        </a>
    </div>

    <ul class="notes-list">
        @forelse ($pendings as $pending)
            <li class="note-item">
                <div>
                    <a class="note-title" href="{{ route('pending.show', $pending->id) }}">
                        {{ $pending->title }}
                    </a>
                    <p class="note-description">{{ $pending->description }}</p>
                    <span class="badge badge-success">Cumplido</span>
                </div>

                <div class="note-actions">
                    <form method="POST" action="{{ route('pending.toggle', $pending->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success btn-sm" title="Marcar no cumplida">
                            <i class="fas fa-check"></i>
                        </button>
                    </form>

                    <a href="{{ route('pending.edit', $pending->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit mr-1"></i>
                        Editar
                    </a>
                </div>
            </li>
        @empty
            <li class="admin-empty">No hay pendientes cumplidos.</li>
        @endforelse
    </ul>
@stop
