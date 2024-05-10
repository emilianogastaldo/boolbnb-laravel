<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
                    [
                        'name' => 'Colazione',
                        'color' => '#FFCF40',
                        'icon' => 'fa-solid fa-mug-saucer'
                    ],
                    [
                        'name' => 'Piscina',
                        'color' => '#0014A8',
                        'icon' => 'fa-solid fa-person-swimming'
                        ],
                    [
                        'name' => 'Wifi',
                        'color' => '#007FFF',
                        'icon' => 'fa-solid fa-wifi'
                    ],
                    [
                        'name' => 'Cucina',
                        'color' => '#ADFF2F',
                        'icon' => 'fa-solid fa-kitchen-set'
                    ],
                    [
                        'name' => 'Parcheggio',
                        'color' => '#1C1C1C',
                        'icon' => 'fa-solid fa-square-parking'
                    ],
                    [
                        'name' => 'Vasca con idromassaggio',
                        'color' => '#1C1C1C',
                        'icon' => 'fa-solid fa-spa'
                    ],
                    [
                        'name' => 'Fumatori',
                        'color' => '#F80000',
                        'icon' => 'fa-solid fa-ban-smoking'
                    ],
                    [
                        'name' => 'Aria condizionata',
                        'color' => '#273BE2',
                        'icon' => 'fa-solid fa-snowflake'
                    ],
                    [
                        'name' => 'Lavatrice',
                        'color' => '#39FF14',
                        'icon' => 'fa-solid fa-jug-detergent'
                    ],
                    [
                        'name' => 'Tv',
                        'color' => '#343E40',
                        'icon' => 'fa-solid fa-tv'
                    ],
                    [
                        'name' => 'Caminetto',
                        'color' => '#A52A2A',
                        'icon' => 'fa-solid fa-fire'
                    ],
                    [
                        'name' => 'Carta igienica',
                        'color' => '#B5B8B1',
                        'icon' => 'fa-solid fa-toilet-paper'
                    ],
                    [
                        'name' => 'Shampo e Bagnoschiuma',
                        'color' => '#A50B5E',
                        'icon' => 'fa-solid fa-pump-soap'
                    ],
                    [
                        'name' => 'Cassaforte',
                        'color' => '#1C1C1C',
                        'icon' => 'fa-solid fa-vault'
                    ],
                    [
                        'name' => 'Estintore',
                        'color' => '#E32636',
                        'icon' => 'fa-solid fa-fire-extinguisher'
                    ],
                    [
                        'name' => 'Accesso con Carrozzina',
                        'color' => '#91A3B0',
                        'icon' => 'fa-solid fa-wheelchair'
                    ],
                    [
                        'name' => 'Servizio navetta',
                        'color' => '#151719',
                        'icon' => 'fa-solid fa-van-shuttle'
                    ],
                    [
                        'name' => 'Feste di compleanno',
                        'color' => '#DA1D81',
                        'icon' => 'fa-solid fa-cake-candles'
                    ],
                    [
                        'name' => 'Piano bar',
                        'color' => '#480607',
                        'icon' => 'fa-solid fa-martini-glass-empty'
                    ],
                    [
                        'name' => 'Kit Spiaggia',
                        'color' => '#FFFF66',
                        'icon' => 'fa-solid fa-umbrella-beach'
                    ],
                    [
                        'name' => 'Zanzariera',
                        'color' => '#434B4D',
                        'icon' => 'fa-solid fa-mosquito-net'
                    ],
                    [
                        'name' => 'Asciugacapelli',
                        'color' => '#ED3CCA',
                        'icon' => 'fa-solid fa-fan'
                    ],
                    [
                        'name' => 'Postazione di lavoro',
                        'color' => '#121910',
                        'icon' => 'fa-solid fa-computer'
                    ],
                    [
                        'name' => 'Manuale della casa',
                        'color' => '#606E8C',
                        'icon' => 'fa-regular fa-file-lines'
                    ],
                    [
                        'name' => 'Kit di prontosoccorso',
                        'color' => '#C80815',
                        'icon' => 'fa-solid fa-kit-medical'
                    ],
                ];
        foreach($services as $service){
            $new_service = new Service();
            $new_service->fill($service);
            $new_service->save();
        }
    }
}
