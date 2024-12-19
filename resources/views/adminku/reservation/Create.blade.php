<!-- resources/views/reservations/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Buat Pemesanan Baru</h1>

        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="vehicle_id">Pilih Kendaraan</label>
                <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="reservation_date">Tanggal Pemesanan</label>
                <input type="date" name="reservation_date" id="reservation_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="start_time">Waktu Mulai</label>
                <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="end_time">Waktu Selesai</label>
                <input type="datetime-local" name="end_time" id="end_time" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Pemesanan</button>
        </form>
    </div>
@endsection
