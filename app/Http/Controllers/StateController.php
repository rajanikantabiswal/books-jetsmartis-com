<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StateController extends Controller
{
    public function getStateDetails($countryId)
    {
        if ($countryId) {
            $states = Cache::remember("states_for_country_{$countryId}", 60, function () use ($countryId) {
                return State::where('country_id', $countryId)->get();
            });
        }

        return response()->json($states);
    }
}
