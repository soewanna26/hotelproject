@extends('admin.dashboard')
@section('body')
    <div class="col-lg-12">
        <div class="block margin-bottom-sm">
            <div class="title"><strong>Rooms</strong></div>
            @include('message')
            <div class="table-responsive">
                <table class="table table-striped mb-3">
                    <thead>
                        <tr>
                            <th>Room Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Wifi</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($rooms->isNotEmpty())
                            @foreach ($rooms as $room)
                                <tr>
                                    <td>{{ $room->room_title }}</td>
                                    <td>{{ Str::words(strip_tags($room->description), 3) }}</td>
                                    <td>{{ $room->price }}</td>
                                    <td>
                                        @if ($room->wifi == 'yes')
                                            <p class="text-success">Yes</p>
                                        @else
                                            <p class="text-danger">No</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($room->room_type == 'regular')
                                            <p class="text-primary">Regular</p>
                                        @elseif ($room->room_type == 'premium')
                                            <p class="text-warning">Premium</p>
                                        @elseif ($room->room_type == 'deluxe')
                                            <p class="text-success">Deluxe</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($room->image != '')
                                            <img src="{{ asset('admin/uploads/room/' . $room->image) }}" alt="Room Image"
                                                width="50" height="50" class="card-img-top">
                                        @else
                                            <img src="https://placehold.co/150x150?text=No Image" alt="No Image"
                                                width="50" height="50" class="card-img-top">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.editRoom', $room->id) }}" class="btn btn-info btn-sm"><i
                                                class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a href="javascript:void(0);" onclick="deleteRoom({{ $room->id }})"
                                            class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
                @if ($rooms->isNotEmpty())
                    {{ $rooms->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
@section('customJs')
    <script type="text/javascript">
        function deleteRoom(id) {
            if (confirm("Are you sure you want to delete")) {
                $.ajax({
                    url: "{{ route('admin.deleteRoom') }}",
                    type: "delete",
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.href = '{{ route('admin.viewRoom') }}';
                    }
                })
            }
        }
    </script>
@endsection
