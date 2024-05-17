@extends('admin.dashboard')
@section('body')
    <div class="col-lg-12">
        <div class="block margin-bottom-sm">
            <div class="title"><strong>Booking</strong></div>
            @include('message')
            <div class="table-responsive">
                <table class="table table-striped mb-3">
                    <thead>
                        <tr>
                            <th>Room_Id</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Arrival Date</th>
                            <th>Leaving Date</th>
                            <th>Status</th>
                            <th>Room Title</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                            <th>Status Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($bookings->isNotEmpty())
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->room_id }}</td>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ $booking->email }}</td>
                                    <td>{{ $booking->phone }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('d M, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->end_date)->format('d M, Y') }}</td>
                                    <td>
                                        @if ($booking->status == 'waiting')
                                            <p class="text-warning">Waiting</p>
                                        @elseif ($booking->status == 'approved')
                                            <p class="text-info">Approved</p>
                                        @elseif ($booking->status == 'rejected')
                                            <p class="text-danger">Rejected</p>
                                        @endif
                                    </td>
                                    <td>{{ $booking->room->room_title }}</td>
                                    <td>{{ $booking->room->price }}</td>
                                    <td>
                                        @if ($booking->room->image != '')
                                            <img src="{{ asset('admin/uploads/room/' . $booking->room->image) }}"
                                                alt="Room Image" width="50" height="50" class="card-img-top">
                                        @else
                                            <img src="https://placehold.co/150x150?text=No Image" alt="No Image"
                                                width="50" height="50" class="card-img-top">
                                        @endif
                                    </td>

                                    <td>
                                        <a href="javascript:void(0);" onclick="deleteBooking({{ $booking->id }})"
                                            class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.approveBooking', $booking->id) }}"
                                            class="btn btn-success btn-sm mb-2">Approve</a>
                                        <a href="{{ route('admin.rejectBooking', $booking->id) }}"
                                            class="btn btn-warning btn-sm">Rejected</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
                @if ($bookings->isNotEmpty())
                    {{ $bookings->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
@section('customJs')
    <script type="text/javascript">
        function deleteBooking(id) {
            if (confirm("Are you sure you want to delete")) {
                $.ajax({
                    url: "{{ route('admin.deleteBooking') }}",
                    type: "delete",
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.href = '{{ route('admin.bookings') }}';
                    }
                })
            }
        }
    </script>
@endsection
