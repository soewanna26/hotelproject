@extends('admin.dashboard')

@section('body')
    <div class="col-lg-12">
        <div class="block">
            <div class="title"><strong>Create Rooms</strong></div>
            <div class="block-body">
                <form class="form-horizontal" action="{{ route('admin.storeRoom') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Room Title</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{ old('room_title') }}"
                                class="form-control @error('room_title')
                            is-invalid
                            @enderror"
                                name="room_title" id="room_title">
                            @error('room_title')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" id="description" rows="5" class="form-control">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Price</label>
                        <div class="col-sm-9">
                            <input type="number" value="{{ old('price') }}"
                                class="form-control @error('price')
                        is-invalid
                        @enderror"
                                name="price" id="price">
                            @error('price')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Room Type</label>
                        <div class="col-sm-9">
                            <select name="room_type" class="form-control mb-3 mb-3" id="room_type">
                                <option selected value="regular">Regular</option>
                                <option value="premium">Premium</option>
                                <option value="deluxe">Deluxe</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Free Wifi</label>
                        <div class="col-sm-9">
                            <select class="form-control mb-3 mb-3" name="wifi" id="wifi">
                                <option selected value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file"
                                class="form-control @error('image')
                            is-invalid
                        @enderror"
                                name="image" id="image" accept="image/*" style="border: none">
                            @error('image')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
            </div>

            <div>
                <button type="submit" class="btn btn-info">Add Room</button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
