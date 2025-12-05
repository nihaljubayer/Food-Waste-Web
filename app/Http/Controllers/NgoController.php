<?php

namespace App\Http\Controllers;

use App\Models\Ngo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NgoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // NGO DASHBOARD
    public function index()
    {
        // Jodi organization user hoy, tar NGO data show korbo
        if (Auth::user()->role === 'organization') {
            $ngos = Ngo::where('email', Auth::user()->email)->get();
        } else {
            // Admin hole shob NGO dekhte parbe
            $ngos = Ngo::latest()->get();
        }

        // Ekhn stats gula dummy rakhlam – pore pickup table theke niye dynamic korte parba
        $stats = [
            'total_pickups'     => 12,
            'pending_requests'  => 5,
            'completed_pickups' => 7,
        ];

        return view('pages.ngos.index', compact('ngos', 'stats'));
    }
}

