@extends('layouts.app')

@section('title', 'Lista appartamenti')

@section('content')


  <div class="d-flex align-items-center justify-content-between my-4">
    <form action="{{ route('admin.flats.index') }}" method="GET">
      <div class="input-group">
        <input type="search" name="search" class="form-control" placeholder="Cerca appartamento" value="{{ $search }}" autofocus>
        <button type="submit" class="input-group-text" id="basic-addon2"><i class="fas fa-magnifying-glass"></i></button>
      </div>
    </form>
    <div class="d-flex gap-3">
      {{-- Go to trash page button --}}
      <a href="{{route('admin.flats.trash')}}" class="btn btn-dark d-none d-md-inline">
        <i class="fas fa-trash-can"></i> Vedi cestino
      </a>
      <a href="{{route('admin.flats.trash')}}" class="btn btn-dark d-inline d-md-none">
        <i class="fas fa-trash-can"></i>
      </a>
      {{-- Add flat Button --}}
      <a href="{{route('admin.flats.create')}}" class="btn btn-success d-none d-md-inline">
        <i class="fas fa-plus me-2"></i> Aggiungi appartamento
      </a>
      <a href="{{route('admin.flats.create')}}" class="btn btn-success d-inline d-md-none">
        <i class="fas fa-plus"></i>
      </a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table align-middle m-0">
      <thead>
          <tr class="text-center">
              <th scope="col" class="d-none d-lg-table-cell">Foto</th>
              <th scope="col">Appartamento</th>
              <th scope="col">Indirizzo</th>
              <th scope="col">Pubblico</th>
              <th scope="col" class="d-none d-md-table-cell">Stanze</th>
              <th scope="col" class="d-none d-md-table-cell">Letti</th>
              <th scope="col" class="d-none d-md-table-cell">Bagni</th>
              <th scope="col" class="d-none d-md-table-cell">Metratura</th>
              <th scope="col">Azioni</th>
          </tr>
      </thead>
      <tbody>
        @forelse ($flats as $flat)
          <tr class="text-center">
              <td class="d-none d-lg-table-cell">
                <img class="img-fluid rounded-3" src="{{$flat->printImage()}}" alt="{{$flat->title}}" style="width: 200px">
              </td>            
              <td >
                <div class="d-flex flex-column">
                  <div>
                    @if ($flat->sponsored)
                    <span class="gold"><i class="fa-solid fa-crown"></i></span>
                    @endif              
                    {{$flat->title}}
                  </div>
                  <div>
                    <a href="{{route('admin.sponsorships.flat', $flat)}}" class="btn btn-sm mt-2 btn-gold">
                      SPONSORIZZA
                    </a>
                  </div>
                </div>
              </td>            
              <td>{{$flat->address}}</td>
              <td>{{$flat->is_visible ? 'Pubblico' : 'Privato'}}</td>
              <td class="d-none d-md-table-cell">{{$flat->room}}</td>
              <td class="d-none d-md-table-cell">{{$flat->bed}}</td>
              <td class="d-none d-md-table-cell">{{$flat->bathroom}}</td>
              <td class="d-none d-md-table-cell">{{$flat->sq_m}} m<sup>2</sup></td>
              <td>
                <div class="d-flex gap-2 flex-column align-items-center ">
                  <a href="{{route('admin.flats.show', $flat->id)}}" class="btn btn-sm btn-primary d-none d-lg-inline width-92">
                    VISUALIZZA
                  </a>
                  <a href="{{route('admin.flats.show', $flat->id)}}" class="btn btn-sm btn-primary d-inline d-lg-none">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="{{route('admin.messages.flat', $flat)}}" class="btn btn-sm orange d-none d-lg-inline width-92">MESSAGGI</a>
                  <a href="{{route('admin.messages.flat', $flat)}}" class="btn btn-sm orange d-inline d-lg-none">
                    <i class="fa-regular fa-message"></i>
                  </a>
                  <a href="{{route('admin.flats.edit', $flat->id)}}" class="btn btn-sm btn-warning d-none d-lg-inline width-92">
                   MODIFICA
                  </a>
                  <a href="{{route('admin.flats.edit', $flat->id)}}" class="btn btn-sm btn-warning d-inline d-lg-none">
                    <i class="fas fa-pencil"></i>
                  </a>
                  <form action="{{route('admin.flats.destroy', $flat->id)}}" method="POST" class="delete-form" data-bs-toggle="modal" data-bs-target="#modal">                           
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger d-none d-lg-inline width-92" type="submit">
                     ELIMINA
                    </button>
                    <button class="btn btn-sm btn-danger d-inline d-lg-none" type="submit">
                      <i class="fas fa-trash-can"></i> 
                    </button>
                  </form>
                </div>
              </td>
          </tr>
              
          @empty
          <tr class="text-center">
              <td class="py-3" colspan="11">Non ci sono appartamenti</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

@endsection

@section('scripts')
@vite('resources/js/delete_confirmation.js')
@endsection