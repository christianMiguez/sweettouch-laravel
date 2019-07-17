<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>@yield('title', 'Sweet Touch')</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('css/material-kit.css?v=2.0.5') }}" rel="stylesheet" />
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  @yield('styles')
</head>

<body class="@yield('body-class')">

    <div class="fixed"></div>

  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{url('/')}}">
        <img src="{{asset("img/sweettouchlogo.png")}}" alt=""> </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
          </button>
      </div>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">

                    <div class="contact_"><i class="material-icons">location_on</i> <span>Rivera 411, Santa Lucía</span> - <i class="material-icons">phone</i> <span>095 039 134 |</span></div>

            </li>
            <li class="nav-item">
                    <a class="nav-link"  href="https://www.facebook.com/pg/sweettouch.com.uy/about/">
                     SOBRE SWEETTOUCH
                    </a>
                  </li>
            <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                Productos
                </a>
                <div class="dropdown-menu dropdown-with-icons">

                <a href="https://demos.creative-tim.com/material-kit/docs/2.1/getting-started/introduction.html" class="dropdown-item">
                    <i class="material-icons">chevron_right</i> Golosinas
                </a>
                <a href="https://demos.creative-tim.com/material-kit/docs/2.1/getting-started/introduction.html" class="dropdown-item">
                    <i class="material-icons">chevron_right</i> Dulces
                </a>
                <a href="https://demos.creative-tim.com/material-kit/docs/2.1/getting-started/introduction.html" class="dropdown-item">
                    <i class="material-icons">chevron_right</i> Tortas
                </a>
                </div>
            </li>

          @guest
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}"><i class="material-icons">person</i></a>
    </li>

    @else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/home') }}">
                {{ __('Mi carrito') }}
            </a>
            @if(auth()->user()->admin)
            <a class="dropdown-item" href="{{ url('/admin/categories') }}">
                {{ __('Gestionar categorías') }}
            </a>
            <a class="dropdown-item" href="{{ url('/admin/products') }}">
                {{ __('Gestionar productos') }}
            </a>
            @endif

            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Cerrar sesión') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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


    @include('includes.footer')


    <!--   Core JS Files   -->
    <script src="{{ asset('/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/plugins/moment.min.js') }}"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{ asset('/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('/js/material-kit.js?v=2.0.5') }}" type="text/javascript"></script>
    @yield('scripts');
  </body>

</html>
