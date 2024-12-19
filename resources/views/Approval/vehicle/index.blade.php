@extends('layouts.app')

@section('content')
    <h1>Manage Vehicles</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">Add New Vehicle</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Vehicle Name</th>
                <th>Vehicle Type</th>
                <th>License Plate</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->name }}</td>
                    <td>{{ $vehicle->type }}</td>
                    <td>{{ $vehicle->license_plate }}</td>
                    <td>
                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline">
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
