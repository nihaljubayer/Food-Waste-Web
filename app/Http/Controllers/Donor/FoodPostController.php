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
            'title'             => 'required|string|max:255',
            'category'          => 'nullable|string|max:100',
            'quantity'          => 'nullable|integer|min:1',
            'unit'              => 'nullable|string|max:50',
            'cooked_at'         => 'nullable|date',
            'expiry_time'       => 'nullable|date|after_or_equal:cooked_at',
            'pickup_time_from'  => 'nullable|date',
            'pickup_time_to'    => 'nullable|date|after_or_equal:pickup_time_from',
            'pickup_address'    => 'nullable|string|max:255',
            'description'       => 'nullable|string',
            'image_path'        => 'nullable|image|max:2048',
        ]);

        $data['user_id'] = $user->id;

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request
                ->file('image_path')
                ->store('food_images', 'public');
        }

        FoodPost::create($data);

        return redirect()
            ->route('donor.dashboard')
            ->with('success', 'Food posted successfully!');
    }

    // ================== MY DONATIONS LIST (with search + filter) ==================
    public function myDonations(Request $request)
    {
        $user = Auth::user();

        // query parameter থেকে search & status নিই
        $searchTerm   = $request->query('q');       // title search
        $filterStatus = $request->query('status');  // available/completed/cancelled...

        // stats এর জন্য সব পোস্ট আনি (filter ছাড়া)
        $statsQuery = FoodPost::where('user_id', $user->id)->get();
        $totalPosts     = $statsQuery->count();
        $availableCount = $statsQuery->where('status', 'available')->count();
        $completedCount = $statsQuery->where('status', 'completed')->count();

        // আসল তালিকা filter করার জন্য নতুন query
        $query = FoodPost::where('user_id', $user->id);

        // status filter
        if ($filterStatus && in_array($filterStatus, ['available', 'reserved', 'completed', 'cancelled'])) {
            $query->where('status', $filterStatus);
        }

        // search filter (title এর উপর)
        if (!empty($searchTerm)) {
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }

        // final list
        $posts = $query->orderBy('created_at', 'desc')->get();

        return view('pages.donor.donations', [
            'user'            => $user,
            'posts'           => $posts,
            'totalPosts'      => $totalPosts,
            'availableCount'  => $availableCount,
            'completedCount'  => $completedCount,
            'searchTerm'      => $searchTerm,
            'filterStatus'    => $filterStatus,
        ]);
    }

    // ================== SINGLE DONATION DETAILS ==================
    public function show(FoodPost $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        return view('pages.donor.food_show', [
            'user' => Auth::user(),
            'post' => $post,
        ]);
    }

    // ================== UPDATE STATUS (Available / Completed / Cancelled) ==================
    public function updateStatus(Request $request, FoodPost $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'required|in:available,reserved,completed,cancelled',
        ]);

        $post->status = $validated['status'];
        $post->save();

        return back()->with('success', 'Donation status updated successfully.');
    }
}
