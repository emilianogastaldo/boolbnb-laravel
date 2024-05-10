@extends('layouts.app')

@section('title', 'Home Guest')

@section('content')

<div class="jumbotron p-2 mb-4 rounded-3">
    <div class="container py-5">
        
    </div>
</div>

<div class="content">
    <div class="container">
        <div>
            @forelse ($flats as $flat)   
            <div class="card p-2 mb-3">
                <div class="card-body">
                    <figure>
                        <img src="{{ $flat->printImage() }}" alt="{{ $flat->title }}">
                    </figure>
                    <div>
                        <h2>{{ $flat->title }}</h2>
                        <p>{{ $flat->abstractGuest() }}...</p>
                    </div>
                </div>
                <div class="text-end">
                    <a class="show" href="{{ route('guest.flats.show', $flat->id) }}">Vedi dettaglio</a>

                </div>
            </div>
            @empty
            <h3>Non ci sono appartamenti</h3>
            @endforelse
        </div>
    </div>
</div>
@endsection