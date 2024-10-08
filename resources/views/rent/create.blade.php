@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card w-100" style="max-width: 600px;">
            <div class="card-header text-center">
                <h4>Add Payment</h4>
            </div>
            <div class="card-body">
                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('rent.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- Paid Amount -->
                        <div class="form-group col-6 mt-3">
                            <label for="paid_amount">Paid Amount<span class="text-danger">*</span></label>
                            <input id="paid_amount" class="form-control" type="text" name="paid_amount" value="{{ old('paid_amount') }}" required>
                        </div>

                        <!-- Mode -->
                        <div class="form-group col-6 mt-3">
                            <label for="mode_of_payment">Mode Of Payment <span class="text-danger">*</span></label>
                            <select name="mode_of_payment" class="form-control" id="mode_of_payment">
                                <option value="">Select</option>
                                <option value="1">Cash</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between mt-4 col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
