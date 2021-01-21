
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bluesky</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Bluesky template project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/styles/bootstrap4/bootstrap.min.css') }}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    <link href="{{ asset('assets/user/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/plugins/rangeslider.js-2.3.0/rangeslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/styles/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/styles/properties.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/styles/news.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/styles/news_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/styles/properties_responsive.css') }}">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	@include('user.includes.header')

	<!-- Header -->

	
	
	@yield('content')

	<!-- Footer -->

	@include('user.includes.footer')
</div>

<script src="{{ asset('assets/user/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/user/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('assets/user/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/user/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/user/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('assets/user/plugins/rangeslider.js-2.3.0/rangeslider.min.js') }}"></script>
<script src="{{ asset('assets/user/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('assets/user/js/custom.js') }}"></script>
<script src="{{ asset('assets/user/js/news.js') }}"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

@yield('script')


</body>
</html>