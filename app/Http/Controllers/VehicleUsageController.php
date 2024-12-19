<?php
// app/Http/Controllers/VehicleUsageController.php
namespace App\Http\Controllers;

use App\Models\VehicleUsage;
use App\Models\Reservation;
use Illuminate\Http\Request;

class VehicleUsageController extends Controller
{
    /**
     * Menampilkan semua riwayat penggunaan kendaraan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $vehicleUsages = VehicleUsage::with('reservation.vehicle', 'driver')->get();
        return view('vehicle_usages.index', compact('vehicleUsages'));
    }

    /**
     * Menampilkan formulir untuk menambahkan riwayat penggunaan kendaraan.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $reservations = Reservation::where('status', 'approved')->get();
        return view('vehicle_usages.create', compact('reservations'));
    }

    /**
     * Menyimpan riwayat penggunaan kendaraan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'distance_travelled' => 'required|numeric',
            'fuel_used' => 'required|numeric',
            'driver_id' => 'required|exists:users,id',
            'usage_date' => 'required|date',
        ]);

        $usage = VehicleUsage::create([
            'reservation_id' => $request->reservation_id,
            'distance_travelled' => $request->distance_travelled,
            'fuel_used' => $request->fuel_used,
            'driver_id' => $request->driver_id,
            'usage_date' => $request->usage_date,
        ]);

        return redirect()->route('vehicle_usages.index')->with('success', 'Vehicle usage recorded successfully.');
    }
}
