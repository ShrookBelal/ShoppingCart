
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Online Shopping</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Montserrat:400,700|Roboto&display=swap" rel="stylesheet"> 

  <link rel="stylesheet" href="{{url('resources/assets/front/fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{url('resources/assets/front/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('resources/assets/front/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{url('resources/assets/front/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{url('resources/assets/front/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{url('resources/assets/front/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{url('resources/assets/front/css/jquery.fancybox.min.css')}}">

  <link rel="stylesheet" href="{{url('resources/assets/front/css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{url('resources/assets/front/fonts/flaticon/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{url('resources/assets/front/css/aos.css')}}">
  <link href="{{url('resources/assets/front/css/jquery.mb.YTPlayer.min.css')}}" media="all" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{url('resources/assets/front/css/star-rating-svg.css')}}">
  {{-- <link rel="stylesheet" href="{{url('resources/assets/front/css/style2.css')}}"> --}}
  <link rel="stylesheet" href="{{url('resources/assets/front/css/style.css')}}">

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 text-center">
            <a href="index.html" class="site-logo">
              <img src="{{url('resources/assets/front/images/logo.png')}}" style="height:80px" alt="Image" class="img-fluid">
            </a>
          </div>
          <a href="#" class="mx-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
        </div>
      </div>
      


      
      <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          
          <div class="mx-auto">
            <nav class="site-navigation position-relative text-left" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none pl-0 d-lg-block border-none">
                <li><a href="{{url('/')}}" class="nav-link text-left">Home</a></li>
                <li><a href="{{url('/products')}}" class="nav-link text-left">Producr</a></li>
                <li><a href="{{url('/cart')}}" class="nav-link text-left">Shop</a></li>
               
                <!-- Authentication Links -->
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
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                 </ul>                                                                                                                                                                                                                                                                                         
               </nav>
             </div>
           </div>
        </div> 
      </div>
    </div>
   
     @yield('content')
      <div class="footer">
      <div class="container">
        
        <div class="row">
          <div class="col-12 text-center">
            <div class="social-icons">
              {{-- <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-youtube"></span></a>
              <a href="#"><span class="icon-instagram"></span></a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>

 
  <script src="{{url('resources/assets/front/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{url('resources/assets/front/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{url('resources/assets/front/js/jquery-ui.js')}}"></script>
  <script src="{{url('resources/assets/front/js/popper.min.js')}}"></script>
  <script src="{{url('resources/assets/front/js/bootstrap.min.js')}}"></script>
  <script src="{{url('resources/assets/front/js/owl.carousel.min.js')}}"></script>
  <script src="{{url('resources/assets/front/js/jquery.stellar.min.js')}}"></script>
  <script src="{{url('resources/assets/front/js/jquery.countdown.min.js')}}"></script>
  <script src="{{url('resources/assets/front/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{url('resources/assets/front/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{url('resources/assets/front/js/aos.js')}}"></script>
  <script src="{{url('resources/assets/front/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{url('resources/assets/front/js/jquery.sticky.js')}}"></script>
  <script src="{{url('resources/assets/front/js/jquery.mb.YTPlayer.min.js')}}"></script>
  <script src="{{url('resources/assets/front/js/main.js')}}"></script>
  <script src="{{url('resources/assets/front/js/components-modal.min.js')}}"></script>
  <script src="{{url('resources/assets/front/js/jquery.star-rating-svg.js')}}"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
  @include('sweet::alert')
  @yield('script')
</body>


</html>