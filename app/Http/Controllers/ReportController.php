<?php
// app/Http/Controllers/ReportController.php
namespace App\Http\Controllers;

use ReservationExport;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    /**
     * Menampilkan formulir untuk membuat laporan pemesanan.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Menghasilkan laporan pemesanan kendaraan dalam periode tertentu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $reservations = Reservation::whereBetween('reservation_date', [$request->start_date, $request->end_date])
            ->with('vehicle', 'user', 'approverLevel1', 'approverLevel2')
            ->get();

        // Export ke Excel (menggunakan package seperti Maatwebsite Excel)
        return response()->json($reservations); // bisa disesuaikan untuk ekspor Excel
    }
    public function export(Request $request)
    {
        return Excel::download(new ReservationExport($request->start_date, $request->end_date), 'reservations.xlsx');
    }
}
