@extends('layouts.app')

@section('content')
    <h1>Reports</h1>
    <a href="{{ route('reports.create') }}" class="btn btn-primary">Generate New Report</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Vehicle</th>
                <th>Employee</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Report</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->vehicle->name }}</td>
                    <td>{{ $report->employee->name }}</td>
                    <td>{{ $report->start_date }}</td>
                    <td>{{ $report->end_date }}</td>
                    <td>
                        <a href="{{ route('reports.show', $report->id) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
