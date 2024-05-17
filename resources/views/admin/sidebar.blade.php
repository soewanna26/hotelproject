<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('admin/img/avatar-6.jpg') }}" alt="..."
                class="img-fluid rounded-circle">
        </div>
        <div class="title">
            <h1 class="h5">{{ Auth::guard('admin')->user()->name }}</h1>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        {{-- <li class="active"><a href="{{ route('admin.dashboard') }}"> <i class="icon-home"></i>Home </a></li> --}}
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i>Hotel Rooms</a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.createRoom') }}">Add Rooms</a></li>
                <li><a href="{{ route('admin.viewRoom') }}">View Rooms</a></li>
                <li><a href="#">Page</a></li>
            </ul>
        </li>
        <li><a href="{{ route('admin.bookings') }}"> <i class="icon-paper-and-pencil"></i>Booking</a></li>
        <li><a href="{{ route('admin.gallary') }}"> <i class="icon-picture"></i>
                Gallary</a></li>
        <li><a href="{{ route('admin.messages') }}"> <i class="icon-contract"></i>
                Message</a></li>
    </ul>
</nav>
