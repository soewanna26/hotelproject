<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Room Detail</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <style type="text/css">
        label {
            display: inline-block;
        }

        input {
            width: 100%;
        }
    </style>
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        @include('layout.header')
    </header>

    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div id="serv_hover" class="room">
                        <div class="room_img" style="padding: 20px">
                            <img src="{{ asset('admin/uploads/room/' . $room->image) }}" alt="#"
                                style="height: 200px;width:350px" />
                        </div>
                        <div class="bed_room">
                            <h3>{{ $room->room_title }}</h3>
                            <p style="padding: 12px">{{ $room->description }}</p>
                            <h4 style="padding:12px">Free Wifi : {{ Str::upper($room->wifi) }}</h4>
                            <h4 style="padding:12px">Room Type : {{ Str::upper($room->room_type) }}</h4>
                            <h4 style="padding:12px">Price : {{ $room->price }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h1 style="font-size: 40px !important ">Book Room</h1>
                    @include('message')
                    {{-- @if ($errors)
                        @foreach ($errors->all() as $errors)
                            <li style="color: red">
                                {{ $errors }}
                            </li>
                        @endforeach
                    @endif --}}
                    <form action="{{ route('addBooking', $room->id) }}" method="POST">
                        @csrf
                        <div>
                            <label>Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', Auth::check() ? Auth::user()->name : '') }}">
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="text" name="email"
                                class="form-control @error('email')
                            is-invalid
                            @enderror"
                                value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}">
                            @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control"
                                value="{{ old('phone', Auth::check() ? Auth::user()->phone : '') }}">
                        </div>
                        <div>
                            <label>Start Date</label>
                            <input type="date" name="startDate" id="startDate"
                                class="form-control @error('startDate')
                            is-invalid
                            @enderror">
                            @error('startDate')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>End Date</label>
                            <input type="date" name="endDate" id="endDate"
                                class="form-control @error('endDate')
                            is-invalid
                            @enderror">
                            @error('endDate')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <input type="submit" value="Book Room" class="btn btn-primary">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--  footer -->
    @include('layout.footer')
    <!-- Javascript files-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;

            var day = dtToday.getDate();

            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();

            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);

        });
    </script>
</body>

</html>
