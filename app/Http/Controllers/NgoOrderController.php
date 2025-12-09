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

    // =========================
    // SHOW ORDERS LIST FOR NGO
    // =========================
    public function index()
    {
        $user = Auth::user();

        // logged-in user er NGO row niye ashi
        $ngo = Ngo::where('email', $user->email)->first();

        if (!$ngo) {
            // jodi kono ngo na thake
            $orders = collect();
        } else {
            $orders = PickupRequest::where('ngo_id', $ngo->id)
                        ->latest()
                        ->get();
        }

        return view('pages.ngos.orders', compact('orders'));
    }

    // (jodi pore status update lagbe, eigulo thakbe)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,completed,cancelled',
        ]);

        $order = PickupRequest::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Order status updated to ' . $request->status . '.');
    }
}
