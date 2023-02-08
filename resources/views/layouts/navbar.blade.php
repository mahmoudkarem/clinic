  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="bi bi-phone"></i> +1 5589 55488 55
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>
  <!-- ======= End Top Bar ======= -->

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

          <h1  class="logo me-auto"><a style="text-decoration: none" href="{{ url('/') }}">Medilab</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="#about">About</a></li>
              <li><a class="nav-link scrollto" href="#services">Services</a></li>
              <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
              @if(Auth::check() && Auth::user()->role->name == 'Patient')
              <li>
                <a class="nav-link" href="{{ route('my.prescription') }}">{{ __('My Prescriptions') }}</a>
              </li>
              @endif
              @if(Auth::check() && Auth::user()->role->name == 'Patient')
              <li>
                <a class="nav-link" href="{{ route('my.booking') }}">{{ __('My Booking') }}</a>
            </li>
              @endif
              @guest
              @if (Route::has('login'))
                  <li >
                      <a class="nav-link scrollto" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
              @endif

              @if (Route::has('register'))
                  <li >
                      <a class="nav-link scrollto" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
              @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      @if(Auth::check() && Auth::user()->role->name == 'Patient')
                      <a href="{{ url('/profile') }}" class="dropdown-item">
                          Profile
                      </a>
                      @else
                      <a href="{{ url('/dashboard') }}" class="dropdown-item">
                          Dashboard
                      </a>
                      @endif
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

          <a style="text-decoration: none" href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>

        </div>
      </header><!-- End Header -->

