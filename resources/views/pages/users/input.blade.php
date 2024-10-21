@extends('layouts.master')
@section('title', 'Users')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Request</h4>
        </div>
        <div class="card-body">
            <div class="card-body">
                <form class="needs-validation"
                    action="{{ route('users.update', $data->id) }}"
                    method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-1">
                        <label class="d-block form-label" for="validationBioBootstrap">Status</label>
                        <select type="select" class="form-control" name="status" id="validationBioBootstrap">
                            <option>Select Status</option>
                            <option value="approved">approved</option>
                            <option value="rejected">rejected</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="btn btn-primary waves-effect waves-float waves-light">Request</button>
                    <a href="{{ route('users.index') }}" type="submit"
                        class="btn btn-primary waves-effect waves-float waves-light">cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection