@extends('layouts.app')

@section('title', 'Unit List')

@section('content')
<div class="container">
    <h1>Unit List</h1>
    <a href="{{ route('units.create') }}" class="btn btn-primary">
        Add New
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Size</th>
                <th>Tenant</th>
                <th>Email</th>
                <th>Rent Amount</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($units as $unit)
                <tr>
                    <td>{{ $unit->unit_name }}</td>
                    <td>{{ $unit->unit_size }}</td>
                    <td>{{ $unit->tenant->name }}</td>
                    <td>{{ $unit->email }}</td>
                    <td>{{ $unit->rent_amount }}</td>
                    <td>{{ $unit->paid_amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
