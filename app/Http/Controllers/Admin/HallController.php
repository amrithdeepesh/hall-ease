<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\HallImage;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * Display a listing of halls
     */
    public function index()
    {
        $halls = Hall::paginate(10);
        return view('admin.halls.index', compact('halls'));
    }

    /**
     * Show the form for creating a new hall
     */
    public function create()
    {
        return view('admin.halls.create');
    }

    /**
     * Store a newly created hall in database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:10',
            'price_per_day' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'status' => 'in:available,maintenance',
        ]);

        Hall::create($validated);

        return redirect()
            ->route('admin.halls.index')
            ->with('success', 'Hall created successfully!');
    }

    /**
     * Display the specified hall
     */
    public function show(Hall $hall)
    {
        $images = $hall->images;
        return view('admin.halls.show', compact('hall', 'images'));
    }

    /**
     * Show the form for editing the specified hall
     */
    public function edit(Hall $hall)
    {
        return view('admin.halls.edit', compact('hall'));
    }

    /**
     * Update the specified hall in database
     */
    public function update(Request $request, Hall $hall)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:10',
            'price_per_day' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'status' => 'in:available,maintenance',
        ]);

        $hall->update($validated);

        return redirect()
            ->route('admin.halls.index')
            ->with('success', 'Hall updated successfully!');
    }

    /**
     * Remove the specified hall from database
     */
    public function destroy(Hall $hall)
    {
        $hall->delete();

        return redirect()
            ->route('admin.halls.index')
            ->with('success', 'Hall deleted successfully!');
    }
}
