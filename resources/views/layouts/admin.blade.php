@extends('adminlte::page')

@section('title')
    @yield('page_title', config('adminlte.title', 'Panel'))
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    @stack('css')
@stop

@section('content_header')
    @hasSection('page_header')
        @yield('page_header')
    @else
        <h1>@yield('page_title', 'Panel')</h1>
    @endif
@stop

@section('content')
    <div class="admin-page">
        @include('layouts.partials.messages')
        @yield('admin_content')
    </div>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (! window.jQuery || ! jQuery.fn.popover) {
                return;
            }

            jQuery('[data-toggle="popover"]').popover({
                container: 'body',
                html: true,
            });
        });
    </script>
    @stack('js')
@stop
