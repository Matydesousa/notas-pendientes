@extends('layouts.admin')

@section('page_title', $pending->title)

@section('page_header')
    <h1>{{ $pending->title }}</h1>
@stop

@section('admin_content')
    <div class="admin-card">
        <div class="admin-card-body">
            <a href="{{ route('pending.index') }}" class="btn btn-secondary mb-3">
                <i class="fas fa-arrow-left mr-1"></i>
                Volver
            </a>

            <p class="note-description">{{ $pending->description }}</p>

            @if ($pending->completed)
                <span class="badge badge-success">Cumplido</span>
            @else
                <span class="badge badge-warning">Pendiente</span>
            @endif

            <form class="mt-3" method="POST" action="{{ route('pending.toggle', $pending->id) }}">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn {{ $pending->completed ? 'btn-success' : 'btn-outline-success' }}">
                    @if ($pending->completed)
                        <i class="fas fa-check mr-1"></i>
                        Cumplida
                    @else
                        <i class="fas fa-check mr-1"></i>
                        Marcar como cumplida
                    @endif
                </button>
            </form>
        </div>
    </div>
@stop
