@extends('layouts.master')
@section('title', 'Input Request Inventory')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Request Iventory</h4>
        </div>
        @can('Admin')
            <div class="card-body">
                <form class="needs-validation"
                    action="{{ route('request-inventories.verification', $data->id) }}"
                    method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-1">
                        <label class="d-block form-label" for="validationBioBootstrap">Status</label>
                        <select type="select" class="form-control" name="status" id="validationBioBootstrap">
                            <option>select status</option>
                            <option value="2">accepted</option>
                            <option value="3">rejected</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Request </button>
                    <a href="{{ route('request-inventories.index') }}" type="submit"
                        class="btn btn-primary waves-effect waves-float waves-light">cancel</a>
                </form>
            </div>
        @else
            <div class="card-body">
                @If($data->id)
                    <form class="needs-validation" novalidate=""
                        action="{{ route('request-inventories.update', $data->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                    @else
                        <form class="needs-validation" novalidate=""
                            action="{{ route('request-inventories.store') }}" method="POST"
                            enctype="multipart/form-data">
                @endif
                @csrf
                <div class="mb-1">
                    <label class="d-block form-label" for="validationBioBootstrap">Inventory</label>
                    <select type="select" class="form-control @error('inventory_id')is-invalid @enderror" name="inventory_id" id="validationBioBootstrap">
                        <option value="" selected disabled>select Inventory</option>
                        @foreach($inventories as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $data->inventory_id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('inventory_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
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
                    <label class="d-block form-label" for="validationBioBootstrap">Date of end</label>
                    <input type="date" class="form-control @error('date_end')is-invalid @enderror" name="date_end"
                        id="validationBioBootstrap"
                        value="{{ $data->date_end }}">
                    @error('date_end')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-1">
                    <label class="d-block form-label" for="validationBioBootstrap">Description</label>
                    <textarea class="form-control @error('description')is-invalid @enderror" name="description"
                        id="validationBioBootstrap">{{ $data->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div><br>
                <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Request</button>
                <a href="{{ route('request-inventories.index') }}" type="submit"
                    class="btn btn-primary waves-effect waves-float waves-light">Cancel</a>
                </form>
            </div>
        @endcan
    </div>
</div>
@endsection