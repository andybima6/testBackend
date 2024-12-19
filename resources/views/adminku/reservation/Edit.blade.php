<!-- resources/views/reservations/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Pemesanan</h1>

        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="vehicle_id">Pilih Kendaraan</label>
                <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}" {{ $vehicle->id == $reservation->vehicle_id ? 'selected' : '' }}>{{ $vehicle->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="reservation_date">Tanggal Pemesanan</label>
                <input type="date" name="reservation_date" id="reservation_date" class="form-control" value="{{ $reservation->reservation_date }}" required>
            </div>

            <div class="form-group">
                <label for="start_time">Waktu Mulai</label>
                <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ $reservation->start_time }}" required>
            </div>

            <div class="form-group">
                <label for="end_time">Waktu Selesai</label>
                <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ $reservation->end_time }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui Pemesanan</button>
        </form>
    </div>
@endsection
