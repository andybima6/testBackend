@extends('layouts.app')

@section('content')
    <h1>Edit Vehicle</h1>
    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Vehicle Name</label>
            <input type="text" name="name" value="{{ $vehicle->name }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" value="{{ $vehicle->type }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="license_plate">License Plate</label>
            <input type="text" name="license_plate" value="{{ $vehicle->license_plate }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
@endsection
