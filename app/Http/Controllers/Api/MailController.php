<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageMail;
use App\Models\Flat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    // Funzione per inviare l'email come nel vecchio esercizio
    public function message(Request $request)
    {
        $data = $request->all();
        $flat = Flat::find($data['flat_id']);
        $ownerEmail = $flat->user->email;
        $mail = new ContactMessageMail($data['flat_id'], $data['first_name'], $data['last_name'], $data['email_sender'], $data['text']);
        Mail::to($ownerEmail)->send($mail);

        // return $data; 
        return response(null, 204);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                // Ho problemi con la validazione di flat_id: se metto string mi da errore 422
                //  se metto number errore 500 (quest'ultimo ho capito perché) 
                'flat_id' => 'required',
                'first_name' => 'required|string',
                'last_name'  => 'required|string',
                'email_sender' => 'required|string|regex:/^([a-z0-9+-]+)(.[a-z0-9+-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/ix',
                'text'  => 'required|string',
            ],
            [
                'flat_id.required' => 'Bisogna inserire l\'id dell\'appartamento',
                'first_name.required' => 'Nome obbligatorio',
                'last_name.required' => 'Cognome obbligatorio',
                'email_sender.required' => 'Email obbligatoria',
                'email_sender.regex' => 'Email non valida',
                'text.required' => 'Messaggio obbligatorio',
            ]
        );
        $data = $request->all();
        // Creo un nuovo messaggio e lo salvo nel database
        $new_message = new Message();
        $new_message->fill($data);
        $new_message->save();

        // Queste righe servono per inviare effetivamente la email, che poi vado a bloccare con Mailtrap
        // $flat = Flat::find($data['flat_id']);
        // $ownerEmail = $flat->user->email;
        // $mail = new ContactMessageMail($data['flat_id'], $data['first_name'], $data['last_name'], $data['email_sender'], $data['text']);
        // Mail::to($ownerEmail)->send($mail);
        return response(null);
    }
}
