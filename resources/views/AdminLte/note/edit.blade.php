@extends('layouts.admin')

@section('page_title', 'Editar nota')

@section('page_header')
    <h1>Editar nota</h1>
@stop

@section('admin_content')
    <div class="admin-card admin-form">
        <div class="admin-card-body">
            <a href="{{ route('note.index') }}" class="btn btn-secondary mb-3">
                <i class="fas fa-arrow-left mr-1"></i>
                Volver
            </a>

            <form method="POST" action="{{ route('note.update', $note->id) }}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input id="title" class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title', $note->title) }}">
                    @error('title')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="6">{{ old('description', $note->description) }}</textarea>
                    @error('description')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i>
                    Actualizar
                </button>
            </form>
        </div>
    </div>
@stop
