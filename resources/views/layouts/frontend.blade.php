<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Creative - Start Bootstrap Theme</title>

  <!-- Font Awesome Icons -->
  {{-- <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}

  <!-- Google Fonts -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'> --}}

  <!-- Plugin CSS -->
  {{-- <link href="./vendor/magnific-popup/magnific-popup.css" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet"> --}}
  {{-- <link href="/vendor/magnific-popup/magnific-popup.css" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet"> --}}



  <!-- Theme CSS - Includes Bootstrap -->
  {{-- <link href="css/creative.min.css" rel="stylesheet"> --}}

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/creative.css') }}" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">ALPHA</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#deviceImg">Device Images</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            @guest
                <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                Dashboard
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                @csrf
                            </form>
                        </div>
                    </li>
            @endguest

        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

  @include('partials.footer')


<!-- Bootstrap core JavaScript -->
{{-- <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
<script src="{{ asset('js/app.js') }}"></script>


<!-- Plugin JavaScript -->
{{-- <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="./vendor/magnific-popup/jquery.magnific-popup.min.js"></script> --}}
{{-- <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script> --}}
{{-- <script src="{{ asset('magnific-popup.min.js') }}"></script> --}}



<!-- Custom scripts for this template -->
{{-- <script src="js/creative.min.js"></script> --}}
{{-- <script src="{{ asset('js/creative.min.js') }}"></script> --}}

<script src="{{ asset('js/creative.js') }}"></script>

</body>

</html>
