<?php

namespace App\Http\Controllers;

use App\Models\Ngo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NgoController extends Controller
{
    public function __construct()
    {
        // just to make sure only logged-in user access these
        $this->middleware('auth');
    }

    // NGO list dekhano
    public function index()
    {
        // jodi logged in user er role 'ngo' hoy, tahole sudhu tar nijer NGO dekhao
        if (Auth::check() && Auth::user()->role === 'ngo') {
            // simplest way: email diye match
            $ngos = Ngo::where('email', Auth::user()->email)
                       ->latest()
                       ->get();
        } else {
            // admin hole shob NGO dekhte parbe
            $ngos = Ngo::latest()->get();
        }

        return view('pages.ngos.index', compact('ngos'));
    }

    // NGO create form (mostly admin use korbe)
    public function create()
    {
        return view('pages.ngos.create');
    }

    // NGO store (form submit)
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:ngos,email',
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'status'  => 'required|in:pending,approved,rejected',
        ]);

        // only needed fields nichi, all() use korchi na
        $data = $request->only(['name', 'email', 'phone', 'address', 'status']);

        Ngo::create($data);

        return redirect()
            ->route('ngos.index')
            ->with('success', 'NGO created successfully.');
    }

    // NGO edit form
    public function edit(Ngo $ngo)
    {
        return view('pages.ngos.edit', compact('ngo'));
    }

    // NGO update
    public function update(Request $request, Ngo $ngo)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:ngos,email,' . $ngo->id,
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'status'  => 'required|in:pending,approved,rejected',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'address', 'status']);

        $ngo->update($data);

        return redirect()
            ->route('ngos.index')
            ->with('success', 'NGO updated successfully.');
    }

    // NGO delete
    public function destroy(Ngo $ngo)
    {
        $ngo->delete();

        return redirect()
            ->route('ngos.index')
            ->with('success', 'NGO deleted successfully.');
    }
}
