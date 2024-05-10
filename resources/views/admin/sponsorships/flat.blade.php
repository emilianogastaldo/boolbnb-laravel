@extends('layouts.app')

@section('title', 'Scegli il pacchetto')

@section('content')
<div class="sponsorships-container d-flex align-items-center justify-content-center flex-column gap-4  mt-5"> <!-- style provvisorio -->
    <div class="row row-cols-1 row-cols-lg-2 align-items-center justify-content-center">
        <div class="col-12 col-lg-4">
            {{-- Card appartamento --}}
            <div class="card  text-center shadow-sm">                
                <h4 class="mt-3">{{$flat->title}}</h4>
                <div>{{$flat->address}}</div>
                <div class="p-3">
                   <img class="img-fluid rounded-3" src="{{$flat->printImage()}}" alt="{{$flat->title}}">
                </div>                                   
            </div>
        </div> 
        <div class="col-12">
            {{-- I pacchetti disponibili --}}
            <h2 class="text-center my-4">I pacchetti disponibili</h2>
            {{-- Tabella --}}
            <div class="table-responsive">
                <table class="table align-middle m-0">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Prezzo</th>
                            <th scope="col">Durata</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sponsorships as $sponsorship)
                        <tr class="text-center">
                            <td>{{ucfirst($sponsorship->name)}}</td>            
                            <td>€ {{$sponsorship->price}}</td>
                            <td>{{$sponsorship->days}}  {{$sponsorship->days == 1 ? 'giorno' : 'giorni'}}</td>
                            <td>
                                <a href="{{ route('admin.payment.token', ['sponsorship_id' => $sponsorship->id, 'flat_id' => $flat->id]) }}"
                                    class="btn btn-gold shadow">
                                    Acquista <i class="fa-solid fa-crown"></i>
                                </a>
                            </td>
                        </tr>
                        
                        @empty
                        {{-- Se vuoto --}}
                        <tr>
                            <td colspan="5">
                                Non ci sono pacchetti
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Disclaimer --}}
        <div id="pippo" class="d-flex align-items-center justify-content-center mt-4">
            <p class="mb-0">Terminato il periodo di sponsorizzazione, l'appartamento tornerà ad essere
                visualizzato normalmente, senza alcuna particolarità *</p>
        </div>
    </div>
</div>
<a class="btn btn-secondary mt-3 mb-2" href="{{ route('admin.sponsorships.index') }}">
    <i class="fa-solid fa-arrow-left"></i> Torna alle sponsorizzazioni
</a>
@endsection