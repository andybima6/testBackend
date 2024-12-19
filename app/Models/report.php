<?php
// app/Models/Report.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['start_date', 'end_date'];

    /**
     * Relasi dengan tabel reservations (laporan pemesanan dalam periode tertentu).
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
