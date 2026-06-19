<?php

namespace App\Http\Controllers;

use App\Models\vehicle_types;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    public function index()
    {
        $vehicleTypes = vehicle_types::all();
        return view('vehicle_types.index', compact('vehicleTypes'));
    }

    public function create()
    {
        return view('vehicle_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:motorcycle,car,other',
            'perjam_pertama' => 'required|integer|min:0',
            'perjam_berikutnya' => 'required|integer|min:0',
            'max_perhari' => 'required|integer|min:0',
        ]);

        vehicle_types::create($request->only([
            'jenis',
            'perjam_pertama',
            'perjam_berikutnya',
            'max_perhari',
        ]));

        return redirect()->route('vehicle-types.index')
            ->with('success', 'Vehicle type saved successfully.');
    }

    public function edit(vehicle_types $vehicleType)
    {
        return view('vehicle_types.edit', compact('vehicleType'));
    }

    public function update(Request $request, vehicle_types $vehicleType)
    {
        $request->validate([
            'jenis' => 'required|in:motorcycle,car,other',
            'perjam_pertama' => 'required|integer|min:0',
            'perjam_berikutnya' => 'required|integer|min:0',
            'max_perhari' => 'required|integer|min:0',
        ]);

        $vehicleType->update($request->only([
            'jenis',
            'perjam_pertama',
            'perjam_berikutnya',
            'max_perhari',
        ]));

        return redirect()->route('vehicle-types.index')
            ->with('success', 'Vehicle type updated successfully.');
    }

    public function destroy(vehicle_types $vehicleType)
    {
        $vehicleType->delete();

        return redirect()->route('vehicle-types.index')
            ->with('success', 'Vehicle type deleted successfully.');
    }
}
