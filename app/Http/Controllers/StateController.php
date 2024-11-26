<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function getStateDetails($countryId)
    {
        if ($countryId) {
            // Fetch exams based on vendorId
            $states = State::where('country_id', $countryId)->get();
        }

        return response()->json($states);
    }
}
