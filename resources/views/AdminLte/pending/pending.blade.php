@extends('layouts.admin')

@section('page_title', 'Pendientes por cumplir')

@section('page_header')
    <h1>Pendientes por cumplir</h1>
@stop

@section('admin_content')
    <div class="admin-toolbar">
        <a href="{{ route('pending.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i>
            Todos
        </a>

        <a href="{{ route('pending.completed') }}" class="btn btn-success">
            <i class="fas fa-check mr-1"></i>
            Cumplidos
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
                    <span class="badge badge-warning">Pendiente</span>
                </div>

                <div class="note-actions">
                    <form method="POST" action="{{ route('pending.toggle', $pending->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-success btn-sm" title="Marcar cumplida">
                            <i class="far fa-square"></i>
                        </button>
                    </form>

                    <a href="{{ route('pending.edit', $pending->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit mr-1"></i>
                        Editar
                    </a>
                </div>
            </li>
        @empty
            <li class="admin-empty">No hay pendientes por cumplir.</li>
        @endforelse
    </ul>
@stop
