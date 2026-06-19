<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = location::all();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location_name' => 'required|string|max:100',
            'max_motorcycle' => 'required|integer|min:0',
            'max_car' => 'required|integer|min:0',
            'max_other' => 'required|integer|min:0',
        ]);

        location::create($request->only([
            'location_name',
            'max_motorcycle',
            'max_car',
            'max_other',
        ]));

        return redirect()->route('locations.index')
            ->with('success', 'Location saved successfully.');
    }

    public function edit(location $location)
    {

    $title = 'Edit Location';

    return view('locations.edit', compact('location', 'title'));

    }

    public function update(Request $request, location $location)
    {
        $request->validate([
            'location_name' => 'required|string|max:100',
            'max_motorcycle' => 'required|integer|min:0',
            'max_car' => 'required|integer|min:0',
            'max_other' => 'required|integer|min:0',
        ]);

        $location->update($request->only([
            'location_name',
            'max_motorcycle',
            'max_car',
            'max_other',
        ]));

        return redirect()->route('locations.index')
            ->with('success', 'Location updated successfully.');
    }

    public function destroy(location $location)
    {
        $location->delete();

        return redirect()->route('locations.index')
            ->with('success', 'Location deleted successfully.');
    }
}
