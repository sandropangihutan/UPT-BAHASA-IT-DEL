@extends('layouts.master')
@section('title', 'Gallery')
@section('content')
<div class="app-content content ">
    <div class="content-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div id="user-profile">
            <!-- profile header -->
            <div class="dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap">
             <div class="me-1">
             </div>
             <div class="dt-buttons d-inline-flex mt-50">
                 @can('Admin')
                 <a class="dt-button add-new btn btn-primary waves-effect waves-float waves-light" href="{{ route('galleries.create') }}">
                     <span>Add Activity</span> 
                 </a>
                 @endcan
             </div>
            </div><br>
            <div class="row">
                @foreach ($galleries as $item)
                 <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                     <div class="card">
                         <img class="card-img-top" src="{{ asset('images/'.$item->image) }}" alt="Card image cap" style="height:170px">
                         <div class="card-body">
                             <h4 class="card-title text-center">{{ $item->title }}</h4>
                             <p class="card-text">
                                 {{ $item->description }}
                             </p>
                             <div class="dt-buttons d-inline-flex mt-50">
                                 @can('Admin')
                                 <a class="btn btn-outline-primary waves-effect center-block" href="{{ route('galleries.edit', $item->id) }}">
                                     <span> Edit </span> 
                                 </a>
                                 @endcan
                             </div>
                         </div>
                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
    </div>
</div>
@endsection