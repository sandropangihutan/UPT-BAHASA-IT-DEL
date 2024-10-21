@extends('layouts.master')
@section('title', 'Input Gallery')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Activity</h4>
        </div>
        <div class="card-body">
            @If($data->id)
                <form class="needs-validation" novalidate=""
                    action="{{ route('galleries.update', $data->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')
                @else
                    <form class="needs-validation" novalidate="" action="{{ route('galleries.store') }}"
                        method="POST" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="mb-1">
                <label class="form-label" for="basic-addon-name">Title activity</label>
                <input type="text" name="title" id="basic-addon-name"
                    class="form-control @error('title')is-invalid @enderror" placeholder="Title" aria-label="Name"
                    aria-describedby="basic-addon-name" value="{{ $data->title }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-1">
                <label for="customFile1" class="form-label">Add images</label>
                <input type="file" class="form-control @error('image')is-invalid @enderror" name="image"
                    id="customFile1" required>{{ $data->image }}</input>
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-1">
                <label class="d-block form-label" for="validationBioBootstrap">Description</label>
                <textarea class="form-control @error('description')is-invalid @enderror" name="description"
                    id="validationBioBootstrap" name="Description">{{ $data->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Submit</button>
            <a href="{{ route('galleries.index') }}"
                class="btn btn-primary waves-effect waves-float waves-light">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection