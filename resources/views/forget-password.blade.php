<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/styleLR.css">
</head>

<body>

    <div class="main">
        <!-- Forget Password Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-form">
                        <h2 class="form-title">Forget Password</h2>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('forget.password.post') }}" method="post" class="register-form" id="forget-form">
                            @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-email"></i></label>
                                <input type="text" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Forget Password"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/mainLR.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
