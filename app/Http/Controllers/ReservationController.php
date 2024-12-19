<?php
// app/Http/Controllers/ReservationController.php
namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Menampilkan daftar pemesanan kendaraan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reservations = Reservation::with('vehicle', 'user', 'approverLevel1', 'approverLevel2')->get();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Menampilkan formulir pemesanan kendaraan.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $vehicles = Vehicle::where('status', 'available')->get();
        $users = User::where('role_id', 'approver')->get();
        return view('reservations.create', compact('vehicles', 'users'));
    }

    /**
     * Menyimpan pemesanan kendaraan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'reservation_date' => 'required|date',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'end_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $reservation = Reservation::create([
            'vehicle_id' => $request->vehicle_id,
            'user_id' => Auth::id(),
            'reservation_date' => $request->reservation_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'pending',
            'approved_by_level1' => null,
            'approved_by_level2' => null,
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    /**
     * Menyetujui pemesanan kendaraan (level 1).
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approveLevel1($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['approved_by_level1' => Auth::id(), 'status' => 'pending']);

        return redirect()->route('reservations.index')->with('success', 'Reservation approved by level 1.');
    }

    /**
     * Menyetujui pemesanan kendaraan (level 2).
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approveLevel2($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['approved_by_level2' => Auth::id(), 'status' => 'approved']);

        return redirect()->route('reservations.index')->with('success', 'Reservation approved by level 2.');
    }

    /**
     * Menolak pemesanan kendaraan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 'rejected']);

        return redirect()->route('reservations.index')->with('error', 'Reservation rejected.');
    }
}
