<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Models\Flat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     // query per la pagina iniziale
    //     $flats = Flat::whereIsVisible(true)->select('id', 'title', 'slug', 'description', 'address', 'room', 'bed', 'bathroom', 'sq_m', 'image')->with('services')->get();

    //     // Recupero i servizi
    //     $services = Service::all();

    //     // Recupero gli input
    //     $addressInput = $request->query('address');
    //     $distanceInput = intval($request->query('distance'));
    //     $roomInput = (int)$request->query('room');
    //     $bathroomInput = (int) $request->query('bathroom');
    //     $servicesInput = json_decode($request->query('services'));

    //     // Chiamata per raccogliere le informazioni sull' appartamento inserito dall'utente
    //     if ($addressInput) {
    //         $response = Http::withoutVerifying()->get('https://api.tomtom.com/search/2/geocode/' . urlencode($addressInput) . '.json?key=MZLTSagj2eSVFwXRWk7KqzDDNLrEA6UF');
    //         $coordinates = $response->json()['results'][0]['position'];

    //         $latitude = $coordinates['lat'];
    //         $longitude = $coordinates['lon'];

    //         $query = Flat::select(
    //             'id',
    //             'user_id',
    //             'title',
    //             'slug',
    //             'address',
    //             'description',
    //             'room',
    //             'bed',
    //             'bathroom',
    //             'sq_m',
    //             'image',
    //             'latitude',
    //             'longitude',
    //             DB::raw("(6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude)))) AS distance")
    //         )
    //             ->whereNull('deleted_at')
    //             ->whereIsVisible(true)
    //             ->with('user')
    //             ->with('services')
    //             ->orderBy('distance');
    //         // Se ho dei filtri, filtro la ricerca
    //         if ($distanceInput) $query->having('distance', '<', $distanceInput);
    //         if ($roomInput) $query->where('room', '>=', $roomInput);
    //         if ($bathroomInput) $query->where('bed', '>=', $bathroomInput);
    //         if ($servicesInput && count($servicesInput)) $query->whereHas('services', function ($query) use ($servicesInput) {
    //             // Ricerca nella colonna id della tabella services i servizi che ho passato
    //             $query->whereIn('services.id', $servicesInput);
    //         }, '=', count($servicesInput));
    //         $flats = $query->get();
    //     }

    //     // Recupero la data di oggi
    //     $today = date('Y-m-d H:i:s');
    //     // Aggiungo dati agli appartamenti
    //     foreach ($flats as $flat) {
    //         if ($flat->image) $flat->image = url('storage/' . $flat->image);
    //         if (count($flat->sponsorships)) {
    //             $dateLastSponsorship = $flat->sponsorships()->max('expiration_date');
    //             if ($dateLastSponsorship >= $today) {
    //                 $flat->sponsored = true;
    //                 $flat->expiration_date = $dateLastSponsorship;
    //             } else {
    //                 $flat->sponsored = false;
    //             }
    //         } else {
    //             $flat->sponsored = false;
    //         }
    //     }
    //     return response()->json(compact('flats', 'services'));
    // }
    public function index(Request $request)
    {
        // query per la pagina iniziale
        $flats = Flat::whereIsVisible(true)->select('id', 'title', 'slug', 'description', 'address', 'room', 'bed', 'bathroom', 'sq_m', 'image')->with('services')->get();

        // Recupero i servizi
        $services = Service::all();

        // Recupero gli input
        $addressInput = $request->query('address');
        $distanceInput = intval($request->query('distance'));
        $roomInput = (int)$request->query('room');
        $bathroomInput = (int) $request->query('bathroom');
        $servicesInput = json_decode($request->query('services'));

        // Chiamata per raccogliere le informazioni sull' appartamento inserito dall'utente
        if ($addressInput) {
            $response = Http::withoutVerifying()->get('https://api.tomtom.com/search/2/geocode/' . urlencode($addressInput) . '.json?key=MZLTSagj2eSVFwXRWk7KqzDDNLrEA6UF');
            $coordinates = $response->json()['results'][0]['position'];

            $latitude = $coordinates['lat'];
            $longitude = $coordinates['lon'];

            $query = Flat::select(
                'id',
                'user_id',
                'title',
                'slug',
                'address',
                'description',
                'room',
                'bed',
                'bathroom',
                'sq_m',
                'image',
                'latitude',
                'longitude',
                DB::raw("(6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude)))) AS distance")
            )
                ->whereNull('deleted_at')
                ->whereIsVisible(true)
                ->with('user')
                ->with('services');

            // Se ho dei filtri, filtro la ricerca
            if ($distanceInput) $query->having('distance', '<', $distanceInput);
            if ($roomInput) $query->where('room', '>=', $roomInput);
            if ($bathroomInput) $query->where('bed', '>=', $bathroomInput);
            if ($servicesInput && count($servicesInput)) $query->whereHas('services', function ($query) use ($servicesInput) {
                // Ricerca nella colonna id della tabella services i servizi che ho passato
                $query->whereIn('services.id', $servicesInput);
            }, '=', count($servicesInput));

            $flats = $query->get();
        }

        // Recupero la data di oggi
        $today = date('Y-m-d H:i:s');
        // Separiamo gli appartamenti sponsorizzati e non sponsorizzati
        $sponsoredFlats = [];
        $regularFlats = [];

        foreach ($flats as $flat) {
            if ($flat->image) $flat->image = url('storage/' . $flat->image);
            if (count($flat->sponsorships)) {
                $dateLastSponsorship = $flat->sponsorships()->max('expiration_date');
                if ($dateLastSponsorship >= $today) {
                    $flat->sponsored = true;
                    $flat->expiration_date = $dateLastSponsorship;
                    $sponsoredFlats[] = $flat;
                } else {
                    $flat->sponsored = false;
                    $regularFlats[] = $flat;
                }
            } else {
                $flat->sponsored = false;
                $regularFlats[] = $flat;
            }
        }

        // Ordinamento per distanza negli appartamenti non sponsorizzati
        usort($regularFlats, function ($a, $b) {
            return $a->distance <=> $b->distance;
        });

        // Uniamo gli appartamenti sponsorizzati e non sponsorizzati
        $flats = array_merge($sponsoredFlats, $regularFlats);

        return response()->json(compact('flats', 'services'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $flat = Flat::whereIsVisible(true)->whereSlug($slug)->with('services')->first();

        if (!$flat) return response(null, 404);
        if ($flat->image) $flat->image = url('storage/' . $flat->image);

        return response()->json($flat);
    }
}
