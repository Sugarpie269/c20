<!DOCTYPE html>
<html>

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G89KJ69T7C"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-G89KJ69T7C');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0"/>
    <title>C20 | Home</title>
    <meta name="keywords" content="C20" />
    <meta name="description" content="C20" />
    <meta property="og:title" content="C20" />
    <meta property="og:description" content="C20" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="{{ asset('front/img/favicon/android-icon-192x192.png')}}" />
    <meta name="twitter:title" content="C20"/>
    <meta name="twitter:description" content="C20"/>
    <meta name="twitter:image" content="{{ asset('front/img/favicon/android-icon-192x192.png')}}"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('front/img/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('front/img/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('front/img/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('front/img/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('front/img/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('front/img/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('front/img/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('front/img/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/img/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('front/img/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('front/img/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/img/favicon/favicon-16x16.png')}}">
    <meta name="msapplication-TileColor" content="#FAFAFA">
    <meta name="msapplication-TileImage" content="{{ asset('front/img/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#FAFAFA">
    <link rel="icon" href="{{ asset('front/img/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/swiper-bundle.min.css') }}">
    @if (Request::segment(1)!="form" && Request::segment(1)!= "light-up")
    @endif
    <script>
        base_url = '{{env("APP_URL")}}';
        var individual = false;
    </script>
    <link rel="stylesheet" href="{{ asset('front/css/style-home.css') }}">
    <script src="{{ asset('front/js/jquery-3.6.0.min.js') }}"></script>
</head>

<body>
    <header class="header">
        <a href="{{env("APP_URL")}}" class="backToPage">
            @if (Request::segment(1)!="")
                <img src="{{ asset('front/img/prev.svg')}}" alt="back">
            @endif
        </a>            
		<nav>
			<ul>
				<li><img src="{{ asset('front/img/header-logo.png')}}" alt="c20 logo"></li>
			</ul>
		</nav>
		<a href="/search"><img src="{{ asset('front/img/search.svg')}}" alt="search"></a>
	</header>
    <main>
        @yield('content')
    </main>    
    <script src="{{ asset('front/js/swiper-bundle.min.js') }}"></script>
</body>

</html>
