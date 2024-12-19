<?php
// app/Models/VehicleUsage.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleUsage extends Model
{
    use HasFactory;

    protected $fillable = ['reservation_id', 'distance_travelled', 'fuel_used', 'driver_id', 'usage_date'];

    /**
     * Relasi dengan tabel reservations (pemakaian terkait dengan pemesanan).
     */
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    /**
     * Relasi dengan tabel users (pengemudi kendaraan).
     */
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
