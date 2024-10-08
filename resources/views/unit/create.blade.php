@extends('layouts.app')

@section('title', 'Unit Profile')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card w-100" style="max-width: 600px;">
            <div class="card-header text-center">
                <h4>Create Unit</h4>
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

                <form method="POST" action="{{ route('units.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- Unit Name -->
                        <div class="form-group col-6 mt-3">
                            <label for="unit_name">Unit Name</label>
                            <input id="unit_name" class="form-control" type="text" name="unit_name" value="{{ old('unit_name') }}">
                        </div>

                        <!-- Tenant Name -->
                        <div class="form-group col-6 mt-3">
                            <label for="tenant_name">Tenant Name</label>
                            <input id="tenant_name" class="form-control" type="text" name="tenant_name" value="{{ old('tenant_name') }}">
                        </div>

                        <!-- Mobile -->
                        <div class="form-group col-6 mt-3">
                            <label for="mobile">Mobile No</label>
                            <input id="mobile" class="form-control" type="text" name="mobile" value="{{ old('mobile') }}">
                        </div>

                        <!-- Unit Size   -->
                        <div class="form-group col-6 mt-3">
                            <label for="unit_size">Unit Size <span class="text-danger">*</span></label>
                            <input id="unit_size" class="form-control" type="text" name="unit_size" value="{{ old('unit_size') }}" required>
                        </div>

                        <!-- Rent Amount -->
                        <div class="form-group col-6 mt-3">
                            <label for="rent_amount">Rent Amount     <span class="text-danger">*</span></label>
                            <input id="rent_amount" class="form-control" type="text" name="rent_amount" value="{{ old('rent_amount') }}" required>
                        </div>

                        <!-- Apartment -->
                        <div class="form-group col-6 mt-3">
                            <label for="apartment_id">Apartment <span class="text-danger">*</span></label>
                            <select name="apartment_id" class="form-control" id="apartment_id">
                                <option value="">Select</option>
                                @foreach($apartment as $ap)
                                <option value="{{ $ap->id }}" {{ old('prefixname') == $ap->id ? 'selected' : '' }}>{{ $ap->apartment_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Email Address -->
                        <div class="form-group col-6 mt-3">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <!-- Password -->
                        <div class="form-group col-6 mt-3">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group col-6 mt-3">
                            <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
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
