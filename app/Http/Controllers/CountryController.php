<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CountryController extends Controller
{
    public function getCountryDetails()
    {
        $countries = Cache::remember('countries', 60, function () {
            return Country::all();
        });

        return response()->json($countries);
    }
}
