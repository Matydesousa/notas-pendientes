@extends('layouts.admin')

@section('page_title', 'Pendientes')

@section('page_header')
    <h1>Pendientes</h1>
@stop

@section('admin_content')
    <div class="admin-toolbar">
        <a href="{{ route('pending.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i>
            Nuevo pendiente
        </a>

        <a href="{{ route('pending.pending') }}" class="btn btn-warning">
            <i class="fas fa-clock mr-1"></i>
            Por cumplir
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

                    @if ($pending->completed)
                        <span class="badge badge-success">Cumplido</span>
                    @else
                        <span class="badge badge-warning">Pendiente</span>
                    @endif
                </div>

                <div class="note-actions">
                    <form method="POST" action="{{ route('pending.toggle', $pending->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm {{ $pending->completed ? 'btn-success' : 'btn-outline-success' }}" title="{{ $pending->completed ? 'Marcar no cumplida' : 'Marcar cumplida' }}">
                            @if ($pending->completed)
                                <i class="fas fa-check"></i>
                            @else
                                <i class="far fa-square"></i>
                            @endif
                        </button>
                    </form>

                    <a href="{{ route('pending.edit', $pending->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit mr-1"></i>
                        Editar
                    </a>

                    <form method="POST" action="{{ route('pending.destroy', $pending->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash mr-1"></i>
                            Eliminar
                        </button>
                    </form>
                </div>
            </li>
        @empty
            <li class="admin-empty">No hay pendientes cargados.</li>
        @endforelse
    </ul>
@stop
