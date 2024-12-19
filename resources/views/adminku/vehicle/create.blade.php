@extends('layouts.app')

@section('content')
    <h1>Create Vehicle</h1>
    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Vehicle Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="license_plate">License Plate</label>
            <input type="text" name="license_plate" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
@endsection
