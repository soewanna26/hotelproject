@extends('admin.dashboard')
@section('body')
    <div class="col-lg-12">
        <div class="block margin-bottom-sm">
            <div class="title"><strong>Customer Messages</strong></div>
            @include('message')
            <div class="table-responsive">
                <table class="table table-striped mb-3">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($messages->isNotEmpty())
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->phone }}</td>
                                    <td>{{ Str::words(strip_tags($message->message), 100) }}</td>
                                    <td>
                                        {{-- <a href="javascript:void(0);" onclick="deleteMessage({{ $message->id }})"
                                            class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a> --}}
                                        <a href="{{ route('admin.sendMail',$message->id) }}" class="btn btn-success btn-sm"><i
                                                class="fa-solid fa-paper-plane mr-2"></i>Send Mail</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
                @if ($messages->isNotEmpty())
                    {{ $messages->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection

