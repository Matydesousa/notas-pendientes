@extends('layouts.admin')

@section('page_title', 'Crear pendiente')

@section('page_header')
    <h1>Crear pendiente</h1>
@stop

@section('admin_content')
    <div class="admin-card admin-form">
        <div class="admin-card-body">
            <a href="{{ route('pending.index') }}" class="btn btn-secondary mb-3">
                <i class="fas fa-arrow-left mr-1"></i>
                Volver
            </a>

            <form method="POST" action="{{ route('pending.store') }}">
                @csrf

                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input id="title" class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}">
                    @error('title')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input id="description" class="form-control @error('description') is-invalid @enderror" type="text" name="description" value="{{ old('description') }}">
                    @error('description')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i>
                    Crear
                </button>
            </form>
        </div>
    </div>
@stop
