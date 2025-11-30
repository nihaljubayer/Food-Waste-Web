<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use App\Models\FoodPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodPostController extends Controller
{
    // ================== CREATE FOOD FORM ==================
    public function create()
    {
        $user = Auth::user();
        return view('pages.donor.food_create', compact('user'));
    }

    // ================== STORE FOOD POST ==================
    public function store(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'category'      => 'nullable|string|max:100',
            'quantity'      => 'nullable|integer|min:1',
            'unit'          => 'nullable|string|max:50',
            'cooked_at'     => 'nullable|date',
            'expiry_time'   => 'nullable|date|after_or_equal:cooked_at',
            'pickup_time_from' => 'nullable|date',
            'pickup_time_to'   => 'nullable|date|after_or_equal:pickup_time_from',
            'pickup_address' => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'image_path'    => 'nullable|image|max:2048',
        ]);

        $data['user_id'] = $user->id;

        // if image uploaded
        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('food_images', 'public');
        }

        FoodPost::create($data);

        return redirect()
            ->route('donor.dashboard')
            ->with('success', 'Food posted successfully!');
    }

    // ================== ⭐ MY DONATIONS LIST ==================
    public function myDonations()
    {
        $user = Auth::user();

        $posts = FoodPost::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.donor.donations', compact('user', 'posts'));
    }
}
