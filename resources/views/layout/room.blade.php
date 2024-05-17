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
            @if ($rooms->isNotEmpty())
                @foreach ($rooms as $room)
                    <div class="col-md-4 col-sm-6">
                        <div id="serv_hover" class="room">
                            <div class="room_img">
                                <figure><img src="{{ asset('admin/uploads/room/' . $room->image) }}" alt="#"
                                        style="height: 200px;width:350px" /></figure>
                            </div>
                            <div class="bed_room">
                                <h3>{{ $room->room_title }}</h3>
                                <p style="padding:10px">{!! Str::limit($room->description,100) !!}</p>

                                <a href="{{ route('roomDetail',$room->id) }}" class="btn btn-info">Room Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
