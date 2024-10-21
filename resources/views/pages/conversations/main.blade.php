@extends('layouts.master')
@section('title', 'Conversations')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div>
                    </div> <br>
                    <div class="card"> 
                        <div class="card-header">
                            <h4 class="card-title">Conversation Topic</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('conversations.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="fname-icon">Topic</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">                                               
                                                    <input name="topic" class="form-control @error('topic')is-invalid @enderror" placeholder="Topic" type="text">
                                                    @error('topic')
                                                    <div class="invalid-feedback">
                                                    {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="fname-icon">Message</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">                                               
                                                    <textarea name="message" class="form-control @error('message')is-invalid @enderror" placeholder="Message" type="text"></textarea>
                                                    @error('message')
                                                    <div class="invalid-feedback">
                                                    {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Sent</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div>
                </div><br>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Conversation</h4>
                        </div>
                        <div class="card-body">
                            @foreach($conversations as $data)
                                <div class="card-body">
                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                        <!-- avatar -->
                                        <div class="avatar me-1">
                                            <img src="img/User.png" alt="avatar img" width="50" height="50">
                                        </div>
                                        <!--/ avatar -->
                                        {{-- Topic --}}
                                        <div class="profile-user-info">
                                            <h6 class="mb-0">{{ $data->user->username }}</h6>
                                            <small class="text-muted">{{ $data->created_at->translatedFormat('l, d F Y') }}</small>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center mb-1 justify-content-between">
                                        <div class="profile-user-info">
                                            <p class="mb-0">{{ $data->message }}</p>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center mb-1 justify-content-end">
                                            @if(Auth::user()->id == $data->user_id  ||  Auth::user()->role == 'admin')
                                            <button class="btn btn-primary me-1" type="button" data-bs-toggle="collapse" data-bs-target="#edit-{{ $data->id }}" aria-expanded="false" aria-controls="edit-{{ $data->id }}">
                                                Edit
                                            </button>
                                            <form action="{{ route('conversations.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger me-1" type="submit">Delete</button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="collapse" id="edit-{{ $data->id }}">
                                        <form action="{{ route('conversations.update', $data->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <fieldset class="mb-75">
                                                <label class="form-label" for="label-textarea">Add Message</label>
                                                <textarea name="message" class="form-control @error('message')is-invalid @enderror" id="label-textarea" rows="3" placeholder="Message">{{ $data->message }}</textarea>
                                                @error('message')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                                @enderror
                                            </fieldset>
                                            <button type="sumbit" class="btn btn-sm btn-primary waves-effect waves-float waves-light">Send</button>
                                        </form>
                                    </div>
                                    @php
                                        $replies = \App\Models\Conversation::where('parent_id', $data->id)->get(); 
                                    @endphp
                                    <!-- comments -->
                                    @foreach ($replies as $reply)
                                    <div class="d-flex align-items-start mb-1">
                                        <div class="avatar mt-25 me-75">
                                            <img src="img/User.png" alt="Avatar" width="34" height="34">
                                        </div>
                                        <div class="profile-user-info">
                                            <h6 class="mb-0">{{ $reply->user->username }}</h6>
                                            <small class="text-muted">{{ $reply->created_at->translatedFormat('l, d F Y') }}</small>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center mb-1 justify-content-between">
                                        <div class="profile-user-info">
                                            <p class="mb-0">{{ $reply->message }}</p>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center mb-1 justify-content-end">
                                            <button class="btn btn-primary me-1" type="button" data-bs-toggle="collapse" data-bs-target="#edit-{{ $data->id }}" aria-expanded="false" aria-controls="edit-{{ $data->id }}">
                                                Edit
                                            </button>
                                            <form action="{{ route('conversations.destroy', $reply->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger me-1" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!--/ comments -->

                                    <!-- comment box -->
                                    <button class="btn btn-primary me-1" type="button" data-bs-toggle="collapse" data-bs-target="#reply-{{ $data->id }}" aria-expanded="false" aria-controls="reply-{{ $data->id }}">
                                        Reply
                                    </button>
                                    <div class="collapse" id="reply-{{ $data->id }}">
                                        <form action="{{ route('conversations.reply', $data->id) }}" method="POST">
                                            @csrf
                                            <fieldset class="mb-75">
                                                <label class="form-label" for="label-textarea">Add Message</label>
                                                <textarea name="message" class="form-control @error('message')is-invalid @enderror" id="label-textarea" rows="3" placeholder="Add message"></textarea>
                                                @error('message')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                                @enderror
                                            </fieldset>
                                            <!--/ comment box -->
                                            <button type="sumbit" class="btn btn-sm btn-primary waves-effect waves-float waves-light">Send</button>
                                        </form>
                                    </div> 
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection