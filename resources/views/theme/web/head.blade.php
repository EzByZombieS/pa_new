<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="noindex, follow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('flosun/css/vendor/bootstrap.min.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('flosun/css/vendor/font.awesome.min.css') }}">
    <!-- Linear Icons CSS -->
    <link rel="stylesheet" href="{{ asset('flosun/css/vendor/linearicons.min.css') }}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('flosun/css/plugins/swiper-bundle.min.css') }}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{ asset('flosun/css/plugins/animate.min.css') }}">
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="{{ asset('flosun/css/plugins/jquery-ui.min.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('flosun/css/plugins/nice-select.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('flosun/css/plugins/magnific-popup.css') }}">
	<link href="{{ asset('css/confirm.css') }}"  rel="stylesheet" type="text/css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('flosun/css/style.css') }}">
	<style>
		.breadcrumbs-area {
        padding: auto;
        background: #f6f6f6 url("{{ asset('img/gif/gif1.gif') }}") no-repeat scroll center center/cover;
    }
	.slide-4 {
		background-image: url("{{ asset('img/gif/gif2.gif') }}");
		background-color: rgba(215, 177, 190, 0.9);
	}
	.slide-3 {
		background-image: url("{{ asset('img/gif/gif3.gif') }}");
		background-color: rgba(215, 177, 190, 0.9);
	}
	</style>
	
	<title>{{config('app.name') . ': ' .$title ?? config('app.name')}}</title>
</head>

