<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsorships = Sponsorship::all();
        foreach ($sponsorships as $sponsorship) {
            if ($sponsorship->duration === 24) $sponsorship->days = '1';
            if ($sponsorship->duration === 72) $sponsorship->days = '3';
            if ($sponsorship->duration === 144) $sponsorship->days = '6';
        }
        return view('admin.sponsorships.index', compact('sponsorships'));
    }

    public function payment(Request $request)
    {
        $data = $request->all();

        $flat = Flat::find($data['flat_id']);

        $today = Carbon::now('Europe/Rome');

        $data['expiration_date'] = $today;

        $flat->sponsorships()->attach($data['sponsorship_id']);

        return to_route('admin.sponsorships.index');
    }

    public function show(String $name)
    {
        $sponsorship = Sponsorship::whereName($name)->first();
        if ($sponsorship->duration === 24) $sponsorship->days = '1';
        if ($sponsorship->duration === 72) $sponsorship->days = '3';
        if ($sponsorship->duration === 144) $sponsorship->days = '6';
        $user_id = auth()->user()->id;

        $flats = Flat::whereUserId($user_id)->get();

        return view('admin.sponsorships.show', compact('flats', 'sponsorship'));
    }

    public function buySponsorship(Flat $flat)
    {
        $sponsorships = Sponsorship::all();
        foreach ($sponsorships as $sponsorship) {
            if ($sponsorship->duration === 24) $sponsorship->days = '1';
            if ($sponsorship->duration === 72) $sponsorship->days = '3';
            if ($sponsorship->duration === 144) $sponsorship->days = '6';
        }
        return view('admin.sponsorships.flat', compact('flat', 'sponsorships'));
    }
}
