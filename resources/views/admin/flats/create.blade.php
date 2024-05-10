@extends('layouts.app')

@section('title', 'Nuovo Appartamento')

@section('content')
    <h1 class="mb-4">Aggiungi un nuovo appartamento</h1>  
    @include('includes.flats.form')
@endsection

@section('scripts')
@vite('resources/js/image_preview.js')
@endsection