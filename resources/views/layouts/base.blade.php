<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Local CSS-->
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  
  <title>SIR</title>
</head>

<body>

  <!-- Start header (Navbar)-->
  <nav id="header" class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href=" {{url('/') }}">
        <img src="{{asset('images/logo.png')}}" alt="logo SIR">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Reservas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('posts')}}">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/aboutUs')}}">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/faqs')}}">FAQs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/contact') }}">Contacto</a>
          </li>
          @if (Route::has('login'))
            @auth
              <a href="{{ url('/home') }}" class="btn btn-outline-dark ml-lg-2">Cuenta</a>
            @else
              <li>
                <a href="{{ route('login') }}" class=" btn btn-SIR ml-lg-4" style="color:white;">Iniciar sesión</a>
              </li>
              @if (Route::has('register'))
                <li>
                  <a href="{{ route('register') }}" class="btn btn-outline-dark ml-lg-2">Registrate</a>
                </li>
              @endif
            @endauth
          @endif


        </ul>
      </div>
    </div>
  </nav>

  <!-- End header -->

  <div class="content">

    @yield('content')

  </div>

  <!-- Start Footer -->

  <footer id="footer">
    <div class="container ">
      <div class="row">
        <div class="col-1">
          <a href=""><img id=logo src="{{asset('images/logo.png')}}"></a>
        </div>
        <div class="col-8 text-center">
          <h4>© 2020 Todos los derechos reservados. IBooking System</h4>
        </div>
        <div class="col">
          <a href="" class="social"><img src="{{asset('images/facebook.png')}}" alt="facebook"></a>

          <a href="" class="social"><img src="{{asset('images/twitter.png')}}" alt="twitter"></a>

          <a href="" class="social"><img src="{{asset('images/gmail.png')}}" alt="gmail"></a>

          <a href="" class="social"><img src="{{asset('images/linkedin.png')}}" alt="linkedin"></a>
        </div>
      </div>
    </div>
  </footer>

  <!-- End Footer -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="javascript/main.js"></script>
</body>

</html>