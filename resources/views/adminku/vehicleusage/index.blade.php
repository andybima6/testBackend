@extends('layouts.app')

@section('content')
    <h1>Vehicle Usage Management</h1>
    <a href="{{ route('vehicleusage.create') }}" class="btn btn-primary">Add New Vehicle Usage</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Vehicle</th>
                <th>Employee</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicleUsages as $usage)
                <tr>
                    <td>{{ $usage->id }}</td>
                    <td>{{ $usage->vehicle->name }}</td>
                    <td>{{ $usage->employee->name }}</td>
                    <td>{{ $usage->start_date }}</td>
                    <td>{{ $usage->end_date }}</td>
                    <td>
                        <a href="{{ route('vehicleusage.edit', $usage->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('vehicleusage.destroy', $usage->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
