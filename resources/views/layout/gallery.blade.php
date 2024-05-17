<div class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>gallery</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($gallaries->isNotEmpty())
                @foreach ($gallaries as $gallary)
                    <div class="col-md-3 col-sm-6">
                        <div class="gallery_img">
                            <figure><img src="{{ asset('admin/uploads/gallary/' . $gallary->image) }}" alt="#"
                                    style="height: 200px !important;width: 300px !important" /></figure>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
