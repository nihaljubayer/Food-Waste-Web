<?php

namespace App\Http\Controllers;

use App\Models\PickupRequest;
use App\Models\Ngo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NgoOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ORDER LIST NGO SIDE
    public function index()
    {
        $user = Auth::user();

        // Logged-in NGO find by email
        $ngo = Ngo::where('email', $user->email)->firstOrFail();

        // All pickup requests for this NGO
        $orders = PickupRequest::with('donor')
            ->where('ngo_id', $ngo->id)
            ->latest()
            ->get();

        return view('pages.ngos.orders', compact('orders'));
    }

    // STATUS UPDATE (accept / complete / cancel)
    public function updateStatus(Request $request, PickupRequest $order)
    {
        $request->validate([
            'status' => 'required|in:accepted,completed,cancelled',
        ]);

        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Order status updated to ' . $request->status . '.');
    }
}


