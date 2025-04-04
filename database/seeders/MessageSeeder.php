<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Message;
use App\Models\Flat;

// Helpers
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $messages = [

            [
                "flat_id" => "1",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interessato a Appartamento",
                "sender_text" => "Salve, sono interessato al vostro appartamento, quando sarebbe disponibile? Grazie arrivederci ",
            ],
            [
                "flat_id" => "2",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interesse a Appartamento",
                "sender_text" => "Buongiorno, quando sarebbe disponibile il suo appartamento? Cordiali saluti ",
            ],
            [
                "flat_id" => "3",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Prenotazione Appartamento",
                "sender_text" => "Buonasera, vorrei sapere la disponibilità sul suo appartamento, Cordiali saluti ",
            ],
            [
                "flat_id" => "4",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Appartamento",
                "sender_text" => "Buongiorno, ho visto il suo appartamento e vorrei effetturare un soggiorno, quando sarebbe disponibile? Grazie e arrivederci ",
            ],
            [
                "flat_id" => "5",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Soggiorno appartamento",
                "sender_text" => "Salve,Vorrei passare il weekend nel suo appartamento, è disponibile? ",
            ],
            [
                "flat_id" => "6",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Appartamento per stasera",
                "sender_text" => "Salve, volevo sapere se per stasera l' appartamento è disponibile, Grazie ",
            ],
            [
                "flat_id" => "7",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Appartamento",
                "sender_text" => "Salve, sono interessato al vostro appartamento, in quali giorni sarebbe disponibile? Grazie e arrivederci ",
            ],
            [
                "flat_id" => "8",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interessato a Appartamento",
                "sender_text" => "Buongiorno, mi piacerebbe molto soggiornare nel suo appartamento, è disponibile Martedi? Grazie arrivederci ",
            ],
            [
                "flat_id" => "9",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interessato a Appartamento",
                "sender_text" => "Salve, sono interessato al vostro appartamento, quando sarebbe disponibile?? ",
            ],
            [
                "flat_id" => "10",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Week-end Appartamento",
                "sender_text" => "Salve, vorrei soggiornare nel suo appartamento questo week-end, è disponibile? Grazie arrivederci ",
            ],
            [
                "flat_id" => "11",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interessato a Appartamento",
                "sender_text" => "Salve, sono interessato al vostro appartamento, quando sarebbe disponibile? Grazie arrivederci ",
            ],
            [
                "flat_id" => "12",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interessato a Appartamento",
                "sender_text" => "Buonasera, sono interessato al vostro appartamento, quando sarebbe disponibile? ",
            ],
            [
                "flat_id" => "13",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Disponibilità Appartamento",
                "sender_text" => "Salve, sono interessato al vostro appartamento, quando sarebbe disponibile? Grazie ",
            ],
            [
                "flat_id" => "14",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => " Appartamento ",
                "sender_text" => "Buongiorno, sono interessato al vostro appartamento, quando sarebbe disponibile? Grazie arrivederci ",
            ],
            [
                "flat_id" => "15",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interessato a Appartamento",
                "sender_text" => "Salve, sono interessato al vostro appartamento, quando sarebbe disponibile?",
            ],
            [
                "flat_id" => "16",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interessato a Appartamento",
                "sender_text" => "Buongiorno,sono interessato al vostro appartamento, quando sarebbe disponibile? Grazie ",
            ],

            [
                "flat_id" => "1",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interessato a Appartamento",
                "sender_text" => "Salve, sono interessato al vostro appartamento, quando sarebbe disponibile? Grazie arrivederci ",
            ],
            [
                "flat_id" => "2",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interesse a Appartamento",
                "sender_text" => "Buongiorno, quando sarebbe disponibile il suo appartamento? Cordiali saluti ",
            ],
            [
                "flat_id" => "3",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Prenotazione Appartamento",
                "sender_text" => "Buonasera, vorrei sapere la disponibilità sul suo appartamento, Cordiali saluti ",
            ],
            [
                "flat_id" => "4",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Appartamento",
                "sender_text" => "Buongiorno, ho visto il suo appartamento e vorrei effetturare un soggiorno, quando sarebbe disponibile? Grazie e arrivederci ",
            ],
            [
                "flat_id" => "5",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Soggiorno appartamento",
                "sender_text" => "Salve,Vorrei passare il weekend nel suo appartamento, è disponibile? ",
            ],
            [
                "flat_id" => "6",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Appartamento per stasera",
                "sender_text" => "Salve, volevo sapere se per stasera l' appartamento è disponibile, Grazie ",
            ],
            [
                "flat_id" => "7",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Appartamento",
                "sender_text" => "Salve, sono interessato al vostro appartamento, in quali giorni sarebbe disponibile? Grazie e arrivederci ",
            ],
            [
                "flat_id" => "8",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interessato a Appartamento",
                "sender_text" => "Buongiorno, mi piacerebbe molto soggiornare nel suo appartamento, è disponibile Martedi? Grazie arrivederci ",
            ],
            [
                "flat_id" => "9",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interessato a Appartamento",
                "sender_text" => "Salve, sono interessato al vostro appartamento, quando sarebbe disponibile?? ",
            ],
            [
                "flat_id" => "10",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Week-end Appartamento",
                "sender_text" => "Salve, vorrei soggiornare nel suo appartamento questo week-end, è disponibile? Grazie arrivederci ",
            ],
            [
                "flat_id" => "11",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interessato a Appartamento",
                "sender_text" => "Salve, sono interessato al vostro appartamento, quando sarebbe disponibile? Grazie arrivederci ",
            ],
            [
                "flat_id" => "12",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interessato a Appartamento",
                "sender_text" => "Buonasera, sono interessato al vostro appartamento, quando sarebbe disponibile? ",
            ],
            [
                "flat_id" => "13",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Disponibilità Appartamento",
                "sender_text" => "Salve, sono interessato al vostro appartamento, quando sarebbe disponibile? Grazie ",
            ],
            [
                "flat_id" => "14",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => " Appartamento ",
                "sender_text" => "Buongiorno, sono interessato al vostro appartamento, quando sarebbe disponibile? Grazie arrivederci ",
            ],
            [
                "flat_id" => "15",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interessato a Appartamento",
                "sender_text" => "Salve, sono interessato al vostro appartamento, quando sarebbe disponibile?",
            ],
            [
                "flat_id" => "16",
                "sender_email" => $faker->email(),
                "sender_name" => $faker->firstName(),
                "sender_surname" => $faker->lastName(),
                "object" => "Interessato a Appartamento",
                "sender_text" => "Buongiorno,sono interessato al vostro appartamento, quando sarebbe disponibile? Grazie ",
            ],

        ];

        foreach ($messages as $key => $message) {
            Message::create([
                "flat_id" => $message["flat_id"],
                "email_sender" => $message["sender_email"],
                "first_name" => $message["sender_name"],
                "last_name" => $message["sender_surname"],
                "text" => $message['sender_text'],
                "created_at" => $faker->dateTimeBetween('-4 months', '-1 days')
            ]);
        }
    }
}
