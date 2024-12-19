<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // Menampilkan daftar kendaraan
    public function index()
    {
        $vehicles = Vehicle::all();
        return response()->json($vehicles);
    }

    // Menampilkan detail kendaraan berdasarkan ID
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return response()->json($vehicle);
    }

    // Menambahkan kendaraan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_name' => 'required|string|max:255',
            'type' => 'required|in:person,cargo',
            'license_plate' => 'required|string|max:20|unique:vehicles',
        ]);

        $vehicle = Vehicle::create($validated);

        return response()->json($vehicle, 201);
    }

    // Memperbarui data kendaraan
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $validated = $request->validate([
            'vehicle_name' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|in:person,cargo',
            'license_plate' => 'sometimes|required|string|max:20|unique:vehicles,license_plate,' . $vehicle->id,
        ]);

        $vehicle->update($validated);

        return response()->json($vehicle);
    }

    // Menghapus kendaraan
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return response()->json(['message' => 'Vehicle deleted successfully']);
    }
}
