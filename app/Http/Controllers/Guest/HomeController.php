<?php

namespace App\Http\Controllers\Guest;

use App\Models\Flat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __invoke()
    {
        return view('auth.login');
    }
}
