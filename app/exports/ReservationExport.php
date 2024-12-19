<?php
use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReservationExport implements FromCollection
{
    protected $start_date;
    protected $end_date;

    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
    {
        return Reservation::whereBetween('reservation_date', [$this->start_date, $this->end_date])->get();
    }
}
