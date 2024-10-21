@extends('layouts.master')
@section('title', 'Input Inventory')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="card">
    <div class="card-header">
        <h4 class="card-title">Add Inventory</h4>
    </div>
    <div class="card-body">
        @If($data->id)
        <form class="needs-validation" novalidate="" action="{{ route('inventories.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @else
        <form class="needs-validation" novalidate="" action="{{ route('inventories.store') }}" method="POST" enctype="multipart/form-data">
        @endif
            @csrf
            <div class="mb-1">
                <label class="form-label" for="basic-addon-name">Name Inventory</label>
                <input type="text" name="name" id="basic-addon-name" class="form-control @error('name')is-invalid @enderror" placeholder="Nama Inventori" aria-label="Name" aria-describedby="basic-addon-name" required value="{{ $data->name }}">
                @error('name')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-1">
                <label for="form-label" class="form-label">Description</label>
                <textarea class="form-control @error('description')is-invalid @enderror" name="description" id="form-label">{{ $data->description }}</textarea>
                @error('description')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-1">
                <label for="customFile1" class="form-label">Add Image</label>
                <input type="file" class="form-control @error('image')is-invalid @enderror" name="image" id="customFile1">{{ $data->image }}
                @error('image')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Submit</button>
            <a href="{{ route('inventories.index') }}" type="submit" class="btn btn-primary waves-effect waves-float waves-light">Cancel</a>
        </form>
    </div>
 </div>
</div>
@endsection