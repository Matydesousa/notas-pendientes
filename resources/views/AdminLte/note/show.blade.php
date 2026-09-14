@extends('layouts.admin')

@section('page_title', $note->title)

@section('page_header')
    <h1>{{ $note->title }}</h1>
@stop

@section('admin_content')
    <div class="admin-card">
        <div class="admin-card-body">
            <a href="{{ route('note.index') }}" class="btn btn-secondary mb-3">
                <i class="fas fa-arrow-left mr-1"></i>
                Volver
            </a>

            <p class="note-description">{!! nl2br(e($note->description)) !!}</p>
        </div>
    </div>
@stop
