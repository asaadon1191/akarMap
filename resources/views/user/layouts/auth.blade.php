
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('assets/userAuth/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/userAuth/css/style.css') }}">
</head>
<body>

    <div class="main">

        <div class="container">
            <div class="signup-content">
               @yield('content')
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="{{ asset('assets/userAuth/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/userAuth/js/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>