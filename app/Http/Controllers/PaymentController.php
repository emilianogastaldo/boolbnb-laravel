<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Braintree\Transaction;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function token(Request $request)
    {
        if (request()->input('flat_id') && request()->input('sponsorship_id')) {
            $flatId = request()->input('flat_id');
            $sponsorshipId = request()->input('sponsorship_id');

            $user = Auth::user();
            $flat = $user->flats->where('id', $flatId);
            if ($flat->isEmpty() || ($sponsorshipId > 3 || $sponsorshipId <= 0)) {
                return to_route('admin.sponsorships.index')->with('type', 'danger')->with('message', 'Ci dispiace, la pagina non esiste, riprova di nuovo.');
            }
            $gateway = new \Braintree\Gateway([
                'environment' => env("BRAINTREE_ENV"),
                'merchantId' => env("BRAINTREE_MERCHANT_ID"),
                'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
                'privateKey' => env("BRAINTREE_PRIVATE_KEY")
            ]);
            $clientToken = $gateway->clientToken()->generate();

            $flat = $flat->first();
            return view('admin.payment.payment', ['token' => $clientToken, 'sponsorship_id' => $sponsorshipId, 'flat' => $flat]);
        } else {
            return to_route('admin.sponsorships.index')->with('type', 'danger')->with('message', 'Ci dispiace, la pagina non esiste, riprova di nuovo.');
        }
    }

    public function process(Request $request)
    {
        $payload = $request->input('payload', false);

        if ($payload && isset($payload['nonce'])) {
            $nonce = $payload['nonce'];
            $sponsorshipId = $request->input('sponsorship');
            $flatId = $request->input('flat');

            $sponsorship = Sponsorship::find($sponsorshipId);

            if (!$sponsorship) {
                return response()->json(['success' => false, 'message' => 'Sponsorship non valida'], 400);
            }

            $gateway = new \Braintree\Gateway([
                'environment' => env("BRAINTREE_ENV"),
                'merchantId' => env("BRAINTREE_MERCHANT_ID"),
                'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
                'privateKey' => env("BRAINTREE_PRIVATE_KEY")
            ]);

            $result = $gateway->transaction()->sale([
                'amount' => $sponsorship->price,
                'paymentMethodNonce' => $nonce,
                'options' => [
                    'submitForSettlement' => true
                ]
            ]);

            if ($result->success) {
                $flat = Flat::find($flatId);
                $today = date('Y-m-d H:i:s');
                // $today = Carbon::now('Europe/Rome');
                // Controllo se ho delle vecchie sposorizzazioni, altrimenti la faccio nuova
                if (count($flat->sponsorships)) {
                    $dateLastSponsorship = $flat->sponsorships()->max('expiration_date');
                    // Se la sponsorship è ancora attiva la prolungo, altrimenti la faccio nuova
                    if ($dateLastSponsorship >= $today) {
                        $expiration_date = date("Y-m-d H:i:s", strtotime('+' . $sponsorship->duration . 'hours', strtotime($dateLastSponsorship)));
                        // $expiration_date = Carbon::now($dateLastSponsorship)->addHour($sponsorship->duration);
                    } else {
                        $expiration_date = date("Y-m-d H:i:s", strtotime('+' . $sponsorship->duration . 'hours', strtotime($today)));
                        // $expiration_date = Carbon::now('Europe/Rome')->addHour($sponsorship->duration);
                    }
                    // $date = Carbon::parse('2016-11-24 11:59:56')->addHour();
                } else {
                    $expiration_date = date("Y-m-d H:i:s", strtotime('+' . $sponsorship->duration . 'hours', strtotime($today)));
                    // $expiration_date = Carbon::now('Europe/Rome')->addHour($sponsorship->duration);
                }
                $flat->sponsorships()->attach($sponsorshipId, ['expiration_date' => $expiration_date]);
                $expiration_date = Carbon::create($expiration_date)->format('d/m/y H:i');
                return response()->json(['success' => true, 'message' => 'Pagamento completato con successo', 'expiration_date' => $expiration_date]);
            } else {
                return response()->json(['success' => false, 'message' => 'Errore durante il pagamento'], 400);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Payload non valido'], 400);
        }
    }
}
