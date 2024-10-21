@extends('layouts.master')
@section('title', 'Input Request Room')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Request Room</h4>
        </div>
            @can('Admin')
                <div class="card-body">
                    <form class="needs-validation"
                        action="{{ route('request-rooms.verification', $data->id) }}"
                        method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="mb-1">
                            <label class="d-block form-label" for="validationBioBootstrap">Status</label>
                            <select type="select" class="form-control" name="status" id="validationBioBootstrap">
                                <option>select Status</option>
                                <option value="approved">approved</option>
                                <option value="rejected">rejected</option>
                            </select>
                        </div>
                        <button type="submit"
                            class="btn btn-primary waves-effect waves-float waves-light">Request</button>
                        <a href="{{ route('request-rooms.index') }}" type="submit"
                            class="btn btn-primary waves-effect waves-float waves-light">Cancel</a>
                    </form>
                </div>
            @else
                <div class="card-body">
                @If($data->id)
                    <form class="needs-validation" novalidate=""
                        action="{{ route('request-rooms.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PATCH')
                    @else
                        <form class="needs-validation" novalidate=""
                            action="{{ route('request-rooms.store') }}" method="POST"
                            enctype="multipart/form-data">
                @endif
                @csrf
                <div class="mb-1">
                    <label class="d-block form-label" for="validationBioBootstrap">Date of use</label>
                    <input type="date" class="form-control @error('date_start')is-invalid @enderror" name="date_start"
                        id="validationBioBootstrap" value="{{ $data->date_start }}">
                    @error('date_start')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-1">
                    <label class="d-block form-label" for="validationBioBootstrap">date of end</label>
                    <input type="date" class="form-control @error('date_end')is-invalid @enderror" name="date_end" id="validationBioBootstrap" value="{{ $data->date_end }}">
                    @error('date_end')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-1">
                    <label class="d-block form-label">Description</label>
                    <textarea class="form-control @error('description')is-invalid @enderror" name="description">{{ $data->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div><br>
                <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Request </button>
                <a href="{{ route('request-rooms.index') }}" type="submit"
                    class="btn btn-primary waves-effect waves-float waves-light">Cancel</a>
                </form>
            @endcan
        </div>
    </div>
</div>
@endsection