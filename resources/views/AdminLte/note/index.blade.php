@extends('layouts.admin')

@section('page_title', 'Notas')

@section('page_header')
    <h1>Notas</h1>
@stop

@section('admin_content')
    <div class="admin-toolbar">
        <a href="{{ route('note.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i>
            Nueva nota
        </a>
    </div>

    <ul class="notes-list">
        @forelse ($notes as $note)
            <li class="note-item">
                <div>
                    <span class="note-title">{{ $note->title }}</span>
                </div>

                <div class="note-actions">
                    <a href="{{ route('note.show', $note->id) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye mr-1"></i>
                        Visualizar
                    </a>

                    <a href="{{ route('note.edit', $note->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit mr-1"></i>
                        Editar
                    </a>

                    <form method="POST" action="{{ route('note.destroy', $note->id) }}">
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
            <li class="admin-empty">No hay notas cargadas.</li>
        @endforelse
    </ul>
@stop
