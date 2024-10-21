<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/styleLR.css') }}">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Main js -->
    <script src="{{ asset('assets/js/mainLR.js') }}"></script>
</head>

<body>

    <div class="main">
        <!-- Reset Password Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-form">
                        <h2 class="form-title">Reset Password</h2>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('reset.password.post') }}" method="POST" class="register-form" id="reset-form">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="New Password" required />
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm New Password" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Reset Password"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- JS -->
    <script src="{{ asset('assets/js/mainLR.js') }}"></script>
</body>

</html>
