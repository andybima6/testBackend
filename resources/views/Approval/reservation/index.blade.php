@extends('layouts.app')

@section('content')
    <h1>Reservations Pending Approval</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Vehicle</th>
                <th>Employee</th>
                <th>Reservation Date</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->vehicle->name }}</td>
                    <td>{{ $reservation->employee->name }}</td>
                    <td>{{ $reservation->reservation_date }}</td>
                    <td>{{ $reservation->start_date }}</td>
                    <td>{{ $reservation->end_date }}</td>
                    <td>{{ $reservation->status }}</td>
                    <td>
                        @if($reservation->status == 'pending')
                            <a href="{{ route('reservations.approve', $reservation->id) }}" class="btn btn-success">Approve</a>
                            <a href="{{ route('reservations.reject', $reservation->id) }}" class="btn btn-danger">Reject</a>
                        @elseif($reservation->status == 'approved')
                            <span class="badge badge-success">Approved</span>
                        @elseif($reservation->status == 'rejected')
                            <span class="badge badge-danger">Rejected</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
    