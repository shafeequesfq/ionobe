<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom-register.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card w-100" style="max-width: 600px;">
            <div class="card-header text-center">
                <h4>Register</h4>
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

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- First Name -->
                        <div class="form-group col-6">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required>
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
                            <button type="submit" class="btn btn-primary">Register</button>
                            <a href="{{ route('login') }}" class="btn btn-link">Already registered? Log in</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
