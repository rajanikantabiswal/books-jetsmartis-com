<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        if(Gate::allows('isAdmin')){
            $candidates= Candidate::get();
            return view('dashboard');
        }else{
            return redirect()->route('candidates.index');
        }
       
    }
}
