@extends('layouts.app')

@section('title', $flat->title)

@section('content')
<div class="container">
    <div class="row g-5 mb-4">
        <div class="col-12 col-lg-6">
            <img src="{{$flat->printImage()}}" class="img-shadow img-fluid rounded-3" alt="{{$flat->title}}">                   
        </div>
        <div class="col-12 col-lg-6">
            <h2>{{$flat->title}}</h2>
            <p>{{$flat->description}}</p>
            <h4>Indirizzo: {{$flat->address}}</h4>
            <h5>Numero stanze: {{$flat->bed}}</h5>
            <h5>Numero bagni: {{$flat->bathroom}}</h5>
            <h5>Metratura: {{$flat->sq_m}} m<sup>2</sup></h5>
            {{-- servizi --}}
            <h5>Servizi offerti:</h5>
            <div class="row row-cols-1 row-cols-sm-2">
                @forelse($flat->services as $service)
                    <div class="col">{{$service->name}}: <i class="{{$service->icon}}" style="color: {{$service->color}}"></i></div>   
                @empty
                    <div class="col">Nessun Servizio</div>
                @endforelse
            </div>            
        </div>
    </div>
    {{-- Buttons --}}
    <div class="d-flex justify-content-between">
        <a href="{{route('admin.flats.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left me-2"></i>Torna indietro</a>
        <a href="{{route('admin.flats.edit', $flat->id)}}" class="btn btn-warning"><i class="fa-solid fa-pencil me-2"></i>Modifica</a>
    </div>
</div>
@endsection
