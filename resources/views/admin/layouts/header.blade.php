<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <div class="header-search">
                    <div class="input-group">
                        <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                        <input type="text" class="form-control">
                        <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                    </div>
                </div>
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{  Auth::user()->image !== null ? asset('upload/doctors/'.Auth::user()->image) : asset('upload/no_image.jpg') }}" alt="">
                        <strong>{{ Auth::user()->name }}</strong>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="ik ik-power dropdown-icon"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>

<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <div class="header-search">
                    <div class="input-group">
                        <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                        <input type="text" class="form-control">
                        <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                    </div>
                </div>
            </div>
            <div class="top-menu d-flex align-items-center">
                <div class="dropdown">
                    @if(Auth::check() && Auth::user()->role->name == 'admin')

                    <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span class="badge bg-danger">{{ App\Models\Booking::where('status', 0)->count() }}</span></a>
                    <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                        <h4 class="header">Notifications</h4>

                        @if ( App\Models\Booking::where('status', 0)->count() > 0)
                        @foreach ( App\Models\Booking::where('status', 0)->get() as $booking )

                        <div class="notifications-wrap">
                            <a href="{{route('all.booking')}}" class="media">
                                <span class="d-flex">
                                    <i class="ik ik-calendar"></i>
                                </span>
                                <span class="media-body">
                                    <span class="heading-font-family media-heading">New Booking at :</span>
                                    <br>
                                    <span class="heading-font-family media-heading">{{$booking->time}}</span>
                                    <br>
                                    <span class="heading-font-family media-heading">{{$booking->date}}</span>
                                    <br>
                                    @foreach ($patients = App\Models\User::where('id', $booking->user_id)->select('name')->get() as $patient )
                                    <span class="media-content">Patien Name : {{$patient->name}}
                                     </span>
                                    @endforeach
                                    <br>
                                    @foreach ( $doctors = App\Models\User::select('name')->where('id', $booking->doctor_id)->get()  as  $doctor)
                                    <span class="media-content">Doctor Name : {{$doctor->name}}  </span>
                                    @endforeach
                                </span>
                            </a>
                        </div>
                        @endforeach
                        @else
                        <div class="notifications-wrap">
                            <a href="#" class="media">

                                <span class="media-body">
                                    <span class="media-content">No Norification Here... </span>
                                </span>
                            </a>
                        </div>
                        @endif
                        @if ( App\Models\Booking::where('status', 0)->count() > 0)
                        <div class="footer"><a href="{{route('all.booking')}}">See all Notification</a></div>
                        @endif
                    </div>
                </div>
                @endif

                <div class="top-menu d-flex align-items-center">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{  Auth::user()->image !== null ? asset('upload/doctors/'.Auth::user()->image) : asset('upload/no_image.jpg') }}" alt="">
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="ik ik-power dropdown-icon"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</header>
