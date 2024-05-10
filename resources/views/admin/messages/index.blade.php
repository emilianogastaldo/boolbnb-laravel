@extends('layouts.app')
@section('title', 'Lista messaggi')

@section('content')
<h1>Messaggi</h1>
<div class="table-responsive my-4">
<table class="table m-0 text-center">
    <thead>
        <tr>
            <th scope="col">Appartamento</th>
            <th scope="col">Nome e cognome</th>
            <th scope="col">Ricevuto il</th>
            <th scope="col">Email</th>
            <th scope="col">Messaggio</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($messages as $message)
        <tr>
            <td>{{$message->flat->title}}</td>            
            <td>{{"$message->first_name $message->last_name"}}</td>
            <td>{{$message->getDate('d/m/y h:i')}}</td>
            <td>{{$message->email_sender}}</td>
            <td>{{$message->text}}</td>
        </tr>            
        @empty
        <tr>
            <td class="py-3" colspan="5">Non ci sono messaggi</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
<a href="{{route('admin.flats.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left me-2"></i>Torna indietro</a>
@endsection