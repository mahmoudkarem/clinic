
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
     <!-- for datepicker -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- for datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">


    <link rel="stylesheet" href="{{ asset('template/dist/css/theme.min.css') }}">
</head>
<body>

<div style="margin-top: 100px" class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Doctor Information</h4>
                    <img src="{{ asset('upload/doctors/') }}/{{ $doctor->image }}" width="100px" height="100px" stype="border-radius: 50%">
                    <br>
                    <br>
                    <p>Name: {{ $doctor->name }}</p>
                    <p>Degree: {{ $doctor->education }}</p>
                    <p>Department: {{ $doctor->department }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach

            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif

            @if(Session::has('errmessage'))
                <div class="alert alert-danger">
                    {{ Session::get('errmessage') }}
                </div>
            @endif

            <form action="{{ route('book.appointment') }}" method="POST">
                @csrf
                <!-- hidden input -->
                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                <input type="hidden" name="date" value="{{ $date }}">

                <div class="card">
                    <div class="card-header"><h5>Booking for {{ $date }}</h5></div>

                    <div class="card-body">
                        <div class="row">
                            @foreach($time_slots as $key => $time)
                            <div class="col-md-3">
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="time" value="{{ $time->time }}">
                                    <span>{{ $time->time }}</span>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-footer">
                    @if(Auth::check())
                        <button type="submit" class="btn btn-success">Book Appointment</button>
                        <a class="btn btn-info" href="{{ url('/') }}">Back To Home </a>
                    @else
                        <p>Please login to make an appointment</p>
                        <a href="/register">Register</a> &nbsp;
                        <a href="/login">Login</a>
                    @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="assets/js/main.js"></script>

<script>
    var dateToday = new Date();
    $( function() {
        $('#datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            showButtonPenel: true,
            numberOfMonths: 2,
            minDate: dateToday
        })
    } );
</script>
<style type="text/css" scoped>
    body {
        background: #fff;
    }
    .ui-corner-all{
        background: brown;
        color: #fff;
    }
    label.btn{
        padding: 0;
        margin: 10px 0;
    }

    label.btn input{
        opacity: 0;
        position: absolute
    }

    label.btn span{
        text-align: center;
        padding: 6px 12px;
        display: block;
        min-width: 80px;
        max-height: 100%
    }

    label.btn input:checked+span{
        background-color: rgb(80, 110, 228);
        color: #fff;
    }

</style>
</body>
</html>

