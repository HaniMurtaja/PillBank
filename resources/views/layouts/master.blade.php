<?php

$logo = [];
$Slider=[];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>تسجيل الدخول - Mentalrace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    
    <link rel="shortcut icon" href="{{ asset('storage/logo/iconmentalrace.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-cSfiDrYfMj9eYCidq//oGXEkMc0vuTxHXizrMOFAaPsLt1zoCUVnSsURN+nef1lj" crossorigin="anonymous">
    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ asset('website_assets/css/font-awesome.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('website_assets/css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('website_assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/custom_style.css') }}">
	<link rel="stylesheet" href="{{ asset('website_assets/css/skins/orange.css') }}">

    <!-- Template JS Files -->
    <script src="{{ asset('website_assets/js/modernizr.js') }}"></script>

</head>

<body dir='rtl' class="auth-page">
    <!-- SVG Preloader Starts -->
    <div id="preloader">
        <div id="preloader-content">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="150px" height="150px" viewBox="100 100 400 400" xml:space="preserve">
                <filter id="dropshadow" height="130%">
                <feGaussianBlur in="SourceAlpha" stdDeviation="5"/>
                <feOffset dx="0" dy="0" result="offsetblur"/>
                <feFlood flood-color="red"/>
                <feComposite in2="offsetblur" operator="in"/>
                <feMerge>
                <feMergeNode/>
                <feMergeNode in="SourceGraphic"/>
                </feMerge>
                </filter>          
                <path class="path" fill="#000000" d="M446.089,261.45c6.135-41.001-25.084-63.033-67.769-77.735l13.844-55.532l-33.801-8.424l-13.48,54.068
                    c-8.896-2.217-18.015-4.304-27.091-6.371l13.568-54.429l-33.776-8.424l-13.861,55.521c-7.354-1.676-14.575-3.328-21.587-5.073
                    l0.034-0.171l-46.617-11.64l-8.993,36.102c0,0,25.08,5.746,24.549,6.105c13.689,3.42,16.159,12.478,15.75,19.658L208.93,357.23
                    c-1.675,4.158-5.925,10.401-15.494,8.031c0.338,0.485-24.579-6.134-24.579-6.134l-9.631,40.468l36.843,9.188
                    c8.178,2.051,16.209,4.19,24.098,6.217l-13.978,56.17l33.764,8.424l13.852-55.571c9.235,2.499,18.186,4.813,26.948,6.995
                    l-13.802,55.309l33.801,8.424l13.994-56.061c57.648,10.902,100.998,6.502,119.237-45.627c14.705-41.979-0.731-66.193-31.06-81.984
                    C425.008,305.984,441.655,291.455,446.089,261.45z M368.859,369.754c-10.455,41.983-81.128,19.285-104.052,13.589l18.562-74.404
                    C306.28,314.65,379.774,325.975,368.859,369.754z M379.302,260.846c-9.527,38.187-68.358,18.781-87.442,14.023l16.828-67.489
                    C327.767,212.14,389.234,221.02,379.302,260.846z"/>       
            </svg>
        </div>
    </div>
    <!-- SVG Preloader Ends -->
    <!-- Wrapper Starts -->
    <div class="wrapper">
        <div class="container-fluid user-auth">
			<div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
				<!-- Logo Starts -->
				<a class="logo" href="/">
					<img class="img-responsive" src="" alt="logo">
				</a>
				<!-- Logo Ends -->
				<!-- Slider Starts -->
				<div id="carousel-testimonials" class="carousel slide carousel-fade" data-ride="carousel">
					<!-- Indicators Starts -->
					<ol class="carousel-indicators">
                       
					</ol>
					<!-- Indicators Ends -->
					<!-- Carousel Inner Starts -->
					<div class="carousel-inner">
                        @foreach($Slider as $key => $s)
						<!-- Carousel Item Starts -->
						<div class="item {{ $key == 0? 'active' : ''}} item-{{ $key }}" style="background-image: url({{asset($s->image)}}) ">
							<div style="width: 100%;">
								<blockquote>
									<p>{!! $s->description !!}</p>
									<footer>{!! $s->title !!}</footer>
								</blockquote>
							</div>
						</div>
						<!-- Carousel Item Ends -->
                        @endforeach
						
					</div>
					<!-- Carousel Inner Ends -->
                    <a class="left carousel-control" href="/#carousel-testimonials" data-slide="prev">
                        <span><i class="fa fa-angle-right" ></i></span>
                    </a>
                    <a class="right carousel-control" href="/#carousel-testimonials" data-slide="next">
                        <span><i class="fa fa-angle-left" ></i></span>
                    </a>
				</div>
				<!-- Slider Ends -->
			</div>
			<div style="overflow: auto;" class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<!-- Logo Starts -->
				<a class="visible-xs" href="/">
					<img class="img-responsive mobile-logo" src="" alt="logo">
				</a>
				<!-- Logo Ends -->
				@yield('content')
				
			</div>
		</div>
        <!-- Template JS Files -->
        <script src="{{ asset('website_assets/js/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('website_assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('website_assets/js/select2.min.js') }}"></script>
        <script src="{{ asset('website_assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('website_assets/js/custom.js') }}"></script>

        @yield('js')
    </div>
    <!-- Wrapper Ends -->
</body>

</html>