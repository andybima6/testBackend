@extends('layouts.app')

@section('content')
    <h1>Create Vehicle Usage</h1>
    <form action="{{ route('vehicleusage.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="vehicle_id">Vehicle</label>
            <select name="vehicle_id" class="form-control" required>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="datetime-local" name="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="datetime-local" name="end_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
@endsection
