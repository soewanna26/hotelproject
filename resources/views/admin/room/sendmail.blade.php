@extends('admin.dashboard')
@section('body')
    <div class="col-lg-12">
        <div class="block margin-bottom-sm">
            <div class="title"><strong>Send Mail Customer</strong></div>
            @include('message')
            <div class="col-md-12">
                <center class="mb-2">
                    <h1 style="font-size: 30px;font-weight: bold">Mail send to {{ $sendMail->name }}</h1>
                </center>
                <div class="block-body">
                    <form class="form-horizontal" action="{{ route('admin.mail',$sendMail->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Greeting</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="greeting" id="greeting">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Mail Body</label>
                            <div class="col-sm-9">
                                <textarea name="body" id="body" cols="5" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Action Text</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="action_text" id="action_text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Action Url</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="action_url" id="action_url">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">End Line</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="endline" id="endline">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Send Mail</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
