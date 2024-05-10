@extends('layouts.app')

@section('title', 'not-found')

@section('content')
    <div class="d-flex align-items-center justify-content-center flex-column gap-2 not-found">
        <h1>404 | Pagina non trovata</h1>
        <a class="btn btn-primary" href="{{route('admin.flats.index')}}">Torna alla home</a>
    </div>
@endsection