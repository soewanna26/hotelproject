@extends('admin.dashboard')

@section('body')
    <div class="col-lg-12">
        <div class="block">
            <div class="title"><strong>Create Gallary</strong></div>
            @include('message')
            <div class="block-body">
                @if ($gallaries->isNotEmpty())
                    <div class="gallery-container d-flex flex-wrap justify-content-center">
                        @foreach ($gallaries as $gallary)
                            <div class="gallery-item col-md-4 d-flex flex-column align-items-center w-full my-2">
                                <img src="{{ asset('admin/uploads/gallary/' . $gallary->image) }}" alt=""
                                    style="height: 200px; width: 300px" class="gallery-image">
                                <a onclick="return confirm('Are U Sure Want to Delete?')" href="{{ route('admin.destroyGallery',$gallary->id) }}" class="btn btn-danger mt-3">Delete Image</a>
                            </div>
                        @endforeach
                    </div>
                @endif
                {{ $gallaries->links() }}
                <div
                    style="display: flex; flex-direction: column; align-items: center; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">
                    <form action="{{ route('admin.gallaryStore') }}" method="POST" enctype="multipart/form-data"
                        style="width: 100%;">
                        @csrf

                        <div class="form-group row mb-3" style="display: flex; width: 100%;">
                            <label for="image" class="col-sm-3 col-form-label" style="width: 30%;">Image</label>
                            <div class="col-sm-9" style="width: 70%;">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" accept="image/*" style="border: none; width: 100%;">
                                @error('image')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info mt-3" style="width: 100%;">Add Gallary</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
