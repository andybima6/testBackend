<?php
// app/Models/Reservation.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id', 'user_id', 'reservation_date', 'start_time', 'end_time', 'status', 'approved_by_level1', 'approved_by_level2'];

    /**
     * Relasi dengan tabel users (pemesan kendaraan).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan tabel vehicles (kendaraan yang dipesan).
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * Relasi dengan tabel users untuk persetujuan level 1.
     */
    public function approverLevel1()
    {
        return $this->belongsTo(User::class, 'approved_by_level1');
    }

    /**
     * Relasi dengan tabel users untuk persetujuan level 2.
     */
    public function approverLevel2()
    {
        return $this->belongsTo(User::class, 'approved_by_level2');
    }
}
