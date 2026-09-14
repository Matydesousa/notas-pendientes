@extends('adminlte::page')

@section('title', 'Notas y Pendientes')

@section('content_header')
    <h1>Notas y Pendientes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3">Organizá tus ideas y tareas</h3>
                    <p class="text-muted mb-0">
                        Desde este espacio podes gestionar tus notas y organizar tus pendientes de forma simple.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Accesos rapidos</h5>

                    <a href="{{ route('note.index') }}" class="btn btn-primary btn-block mb-2">
                        <i class="fas fa-sticky-note mr-1"></i>
                        Ver notas
                    </a>

                    <a href="{{ route('pending.index') }}" class="btn btn-success btn-block">
                        <i class="fas fa-tasks mr-1"></i>
                        Ver pendientes
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
