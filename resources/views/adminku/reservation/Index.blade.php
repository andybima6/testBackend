<!-- resources/views/reservations/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Pemesanan Kendaraan</h1>

        <!-- Jika role admin, tampilkan tombol untuk membuat pemesanan baru -->
        @can('admin')
            <a href="{{ route('reservations.create') }}" class="btn btn-primary mb-3">Buat Pemesanan Baru</a>
        @endcan

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Kendaraan</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->vehicle->name }}</td>
                        <td>{{ $reservation->reservation_date }}</td>
                        <td>{{ $reservation->start_time }}</td>
                        <td>{{ $reservation->end_time }}</td>
                        <td>{{ $reservation->status }}</td>
                        <td>
                            @can('admin')
                                <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @endcan

                            @can('approve')
                                @if($reservation->status == 'pending')
                                    <a href="{{ route('reservations.approve.level1', $reservation->id) }}" class="btn btn-success btn-sm">Setujui Level 1</a>
                                    <a href="{{ route('reservations.approve.level2', $reservation->id) }}" class="btn btn-success btn-sm">Setujui Level 2</a>
                                @endif
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
