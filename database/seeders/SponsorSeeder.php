<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creo un array per le sponsorizzazioni
        $sponsorships = [
            [
                'name' => 'argento',
                'price' => '2.99',
                'duration' => '24',
            ],
            [
                'name' => 'oro',
                'price' => '5.99',
                'duration' => '72',
            ],
            [
                'name' => 'platino',
                'price' => '9.99',
                'duration' => '144',
            ]
        ];

        // faccio un ciclo sull'array per creare le sponsorizzazioni
        foreach ($sponsorships as $sponsorship) {
            $new_sponsorship = new Sponsorship();
            $new_sponsorship->fill($sponsorship);
            $new_sponsorship->save();
        }
    }
}
