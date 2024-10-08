@extends('layouts.app')

@section('title', 'Rent Details')

@section('content')
<div class="container w-100">
    <h1>Payment List</h1>
    <a href="{{ route('rent.index') }}" class="btn btn-warning">
        Back
    </a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Amount</th>
                <th>Mode</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($installment as $pay)
                <tr>
                    <td>{{ $pay->paid_amount }}</td>
                    <td>Cash</td>
                    <td>{{ date('d-m-Y',strtotime($pay->created_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
