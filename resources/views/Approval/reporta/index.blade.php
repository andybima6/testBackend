@extends('layouts.app')

@section('content')
    <h1>Vehicle Reservation Report</h1>

    <form action="{{ route('reports.export') }}" method="GET" class="mb-3">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required>

        <button type="submit" class="btn btn-success">Export Report</button>
    </form>

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
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->vehicle->name }}</td>
                    <td>{{ $report->employee->name }}</td>
                    <td>{{ $report->reservation_date }}</td>
                    <td>{{ $report->start_date }}</td>
                    <td>{{ $report->end_date }}</td>
                    <td>{{ $report->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
