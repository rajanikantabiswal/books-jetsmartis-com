<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getCountryDetails()
    {
        $countries = Country::all();

        return response()->json($countries);
    }
}
