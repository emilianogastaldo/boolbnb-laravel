@extends('layouts.app')

@section('title', 'Verifica Email')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica il tuo indirizzo E-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Un nuovo link è stato inviato al tuo indirizzo email.') }}
                    </div>
                    @endif

                    {{ __('Prima di continuare, perfavore controlla la tua mail per un link di verifica') }}
                    {{ __('Se non hai ricevuto la email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clicca qui per richiederne un\' altra') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
