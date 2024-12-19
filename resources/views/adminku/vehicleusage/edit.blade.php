@extends('layouts.app')

@section('content')
    <h1>Edit Vehicle Usage</h1>
    <form action="{{ route('vehicleusage.update', $usage->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="vehicle_id">Vehicle</label>
            <select name="vehicle_id" class="form-control" required>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}" {{ $vehicle->id == $usage->vehicle_id ? 'selected' : '' }}>{{ $vehicle->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $employee->id == $usage->employee_id ? 'selected' : '' }}>{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="datetime-local" name="start_date" value="{{ $usage->start_date }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="datetime-local" name="end_date" value="{{ $usage->end_date }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
@endsection
