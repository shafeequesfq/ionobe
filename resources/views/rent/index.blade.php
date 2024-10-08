@extends('layouts.app')

@section('title', 'Rent Details')

@section('content')
<div class="container w-100">
    <h1>Rent Details</h1>
    <a href="{{ route('rent.create') }}" class="btn btn-warning">
        Add Payment
    </a>
    <a href="{{ route('payment_list') }}" class="btn btn-warning">
        Payment List
    </a>

    <!-- Row for Cards -->
    <div class="row w-100">
        <!-- Total Rent Card -->
        <div class="col-12">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Rent</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $units->rent_amount ?? '0' }}</h5>
                </div>
            </div>
        </div>

        <!-- Rent Paid Card -->
        <div class="col-12">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Rent Paid</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $units->paid_amount ?? '0' }}</h5>
                </div>
            </div>
        </div>

        <!-- Balance Card -->
        <div class="col-12">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Balance</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $units->balance_amount ?? '0' }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
