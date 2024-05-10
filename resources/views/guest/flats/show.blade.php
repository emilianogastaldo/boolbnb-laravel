@extends('layouts.app')

@section('title', 'Guest Dettaglio')

@section('content')

    <div class="card mb-3">
        <div class="card-body">
            <figure>
                <img src="{{ $flat->printImage() }}" alt="{{ $flat->title }}">
            </figure>
            <div>
                <h2>{{ $flat->title }}</h2>
                <address>{{ $flat->address }}</address>
                <p>{{ $flat->description }}</p>
                <h5>Metratura: {{ $flat->sq_m }} m²</h5>
                <h5>Stanze: {{ $flat->room }}</h5>
                <h5>Bagni: {{ $flat->bathroom }}</h5>
                <h5>Posti letto: {{ $flat->bed }}</h5>
            </div>
        </div>
    </div>

@endsection