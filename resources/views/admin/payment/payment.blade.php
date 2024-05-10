@extends('layouts.app')
@section('title', 'Pagamento')

@section('cdns')
    <script src="https://js.braintreegateway.com/web/dropin/1.42.0/js/dropin.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
@endsection

@section('content')
    <div id="payment_container" class="container ">
        <h1 class="back-gold mb-4">
            <span class="icon-section me-2">
                <i class="fa-solid fa-crown fa-sm"></i>
            </span>
            Pagamento
        </h1>   
        <div class="row row-cols-sm-1 row-cols-md-2 align-items-center justify-content-center my-4" id="payment-row" >
            <div class="col-12">
                <div class="card mx-auto" style="width: 300px">
                    <div class="card-body">
                        <h3>{{$flat->title}}</h3>
                        @if($sponsorship_id == 1)
                            <h5 class="card-title">Pacchetto sponsorizzazione:</h5> <div class="h5 text-argento mt-2"> Argento <i class="fa-solid fa-crown fa-sm"></i></div>                                
                        @elseif ($sponsorship_id == 2)
                            <h5 class="card-title">Pacchetto sponsorizzazione:</h5> <div class="h5 text-oro mt-2"> Oro <i class="fa-solid fa-crown fa-sm"></i></div>                              
                        @elseif ($sponsorship_id == 3)
                            <h5 class="card-title">Pacchetto sponsorizzazione:</h5> <div class="h5 text-platino mt-2"> Platino <i class="fa-solid fa-crown fa-sm"></i></div>                                
                        @endif
                        <div class="card-text d-none" id="isSent">
                            Grazie per aver sponsorizzato il tuo appartamento. <br> Sarà visibile in home page in una sezione dedicata fino al <span id="expiration"></span>
                        </div>
                        <a class="btn btn-primary mt-4 text-center" href="{{ route('admin.flats.index') }}">
                            Torna alla home
                            <i class="fa-solid fa-house"></i>
                        </a>                        
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="d-flex align-items-start justify-content-center flex-column" style="width: 300px">
                    @csrf
                    {{-- Stile fornito da Braintree --}}
                    <div id="dropin-container"></div>
                    
                    <div class="info-payment text-center">
                        <a id="submit-button" class="btn btn-sm btn-success">
                            Procedi al pagamento
                        </a>
                    </div>
                </div>
            </div>   
        </div>
        <div class="d-none d-flex justify-content-center align-items-center" id="spin" style="height: 300px">
            <div class="spinner-border text-primary">               
            </div>
        </div>
        <div class="d-flex justify-content-start">
            <a class="btn btn-secondary mb-2" href="{{ route('admin.sponsorships.index') }}">
                <i class="fa-solid fa-arrow-left"></i> Torna alle sponsorizzazioni
            </a>
        </div>
    </div>
@endsection



@section('scripts')
    <script>
        
        const button = document.querySelector('#submit-button');
        const expirationField = document.getElementById('expiration');
        const paymentAll = document.getElementById('payment-row');
        const urlParams = new URLSearchParams(window.location.search);
        const spin = document.getElementById('spin');
        let sponsorship = urlParams.get('sponsorship_id');
        let flat = urlParams.get('flat_id');

        // Creo la tendina
        braintree.dropin.create({
            authorization: '{{ $token }}',
            container: '#dropin-container'
        }, function(createErr, dropinInstance) {
            if (createErr) {
                console.error(createErr);
                return;
            }
            const instance = dropinInstance;

            // Creo la richiesta per la rotta process
            button.addEventListener('click', function() {
                paymentAll.classList.add('d-none');
                spin.classList.remove('d-none');
                instance.requestPaymentMethod(function(err, payload) {
                    $.get('{{ route('admin.payment.process') }}', {
                        payload,
                        sponsorship,
                        flat

                    }, function(response) {
                        if (response.success) {
                            // Messaggio di successo
                            $('#submit-button').addClass('d-none');
                            $('#isSent').removeClass('d-none');
                            expirationField.innerText = response.expiration_date;
                            paymentAll.classList.remove('d-none');
                            spin.classList.add('d-none');
                        } else {
                            // Messaggio di pagamento fallito
                            alert('Pagamento fallito. Riprova');
                        }
                    }, 'json');
                });
            });
        });
    </script>
@endsection