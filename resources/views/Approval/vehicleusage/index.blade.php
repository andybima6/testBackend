@extends('layouts.app')

@section('content')
    <h1>Vehicle Usage History</h1>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Vehicle</th>
                <th>Employee</th>
                <th>Usage Date</th>
                <th>Mileage</th>
                <th>Fuel Consumption</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicleUsages as $usage)
                <tr>
                    <td>{{ $usage->id }}</td>
                    <td>{{ $usage->vehicle->name }}</td>
                    <td>{{ $usage->employee->name }}</td>
                    <td>{{ $usage->usage_date }}</td>
                    <td>{{ $usage->mileage }} km</td>
                    <td>{{ $usage->fuel_consumption }} liters</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
