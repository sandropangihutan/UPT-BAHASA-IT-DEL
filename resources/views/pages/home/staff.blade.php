@extends('layouts.master')
@section('title', 'Staff')
@section('content')
<div class="app-content content ">
    <div class="content-body">
        <div id="user-profile">
            <!-- profile header -->
            <div class="row">
                 <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                     <div class="card">
                         <div class="card-body">
                             <div class="user-avatar-section">
                                 <div class="d-flex align-items-center flex-column">
                                     <img class="img-fluid rounded mt-3 mb-2" src="{{ asset('img/staff/Rentauli.jpg') }}" height="210" width="210" alt="User avatar" />
                                     <div class="user-info text-center">
                                         <h4>Rentauli Mariah Silalahi, S.Pd, M. Ed</h4><br><br>
                                     </div>
                                 </div>
                             </div>
                             <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                             <div class="info-container">
                                 <ul class="list-unstyled">
                                     <li class="mb-75">
                                         <span>Rentauli Mariah Silalahi, S.Pd, M. Ed obtained her Master’s Degree from Monash University. She is currently doing her PhD at University of Bristol</span>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                     <div class="card">
                         <div class="card-body">
                             <div class="user-avatar-section">
                                 <div class="d-flex align-items-center flex-column">
                                     <img class="img-fluid rounded mt-3 mb-2" src="{{ asset('img/staff/Rumondang.jpg') }}" height="210" width="210" alt="User avatar" />
                                     <div class="user-info text-center">
                                         <h4>Rumondang Miranda Marsaulina, S.P, M.Si</h4>
                                     </div>
                                 </div>
                             </div><br>
                             <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                             <div class="info-container">
                                 <ul class="list-unstyled">
                                     <li class="mb-75">
                                         <span>Rumondang Miranda Marsaulina, S.P, M.Si obtained her Master’s Degree from Universitas Indonesia</span><br><br>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                     <div class="card">
                         <div class="card-body">
                             <div class="user-avatar-section">
                                 <div class="d-flex align-items-center flex-column">
                                     <img class="img-fluid rounded mt-3 mb-2" src="{{ asset('img/staff/Tiurma.jpg') }}" height="210" width="210" alt="User avatar" />
                                     <div class="user-info text-center">
                                         <h4>Tiurma Lumban Gaol, SP, M.P</h4>
                                     </div><br>
                                 </div>
                             </div><br>
                             <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                             <div class="info-container">
                                 <ul class="list-unstyled">
                                     <li class="mb-75">
                                         <span>Tiurma Lumban Gaol, SP, M.P obtained her Master’s Degree from Institut Pertanian Bogor</span><br><br><br>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                     <div class="card">
                         <div class="card-body">
                             <div class="user-avatar-section">
                                 <div class="d-flex align-items-center flex-column">
                                     <img class="img-fluid rounded mt-3 mb-2" src="{{ asset('img/staff/Santi.png') }}" height="210" width="210" alt="User avatar" />
                                     <div class="user-info text-center">
                                         <h4>Santi Agustina Manalu, S.S., M.Pd</h4>
                                     </div>
                                 </div>
                             </div><br>
                             <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                             <div class="info-container">
                                 <ul class="list-unstyled">
                                     <li class="mb-75">
                                         <span>Santi Agustina Manalu, S.S., M.Pd obtained her Master’s Degree from Universitas Pelita Harapan </span>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                     <div class="card">
                         <div class="card-body">
                             <div class="user-avatar-section">
                                 <div class="d-flex align-items-center flex-column">
                                     <img class="img-fluid rounded mt-3 mb-2" src="{{ asset('img/staff/Monalisa.jpg') }}" height="210" width="210" alt="User avatar" />
                                     <div class="user-info text-center">
                                         <h4>Monalisa Pasaribu, S.S.,M.Ed</h4>
                                     </div><br>
                                 </div>
                             </div>
                             <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                             <div class="info-container">
                                 <ul class="list-unstyled">
                                     <li class="mb-75">
                                         <span>Monalisa Pasaribu obtained her Master’s Degree from University of Wollongong, Australia</span>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                     <div class="card">
                         <div class="card-body">
                             <div class="user-avatar-section">
                                 <div class="d-flex align-items-center flex-column">
                                     <img class="img-fluid rounded mt-3 mb-2" src="{{ asset('img/staff/Tahan.png') }}" height="210" width="210" alt="User avatar" />
                                     <div class="user-info text-center">
                                         <h4>Tahan Sihombing, S.Pd.,M.AppLing (TESOL)</h4>
                                     </div>
                                 </div>
                             </div>
                             <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                             <div class="info-container">
                                 <ul class="list-unstyled">
                                     <li class="mb-75">
                                         <span>Tahan Sihombing obtained his Master’s Degree  from the University of Queensland, Australia</span>
                                     </li><br>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                     <div class="card">
                         <div class="card-body">
                             <div class="user-avatar-section">
                                 <div class="d-flex align-items-center flex-column">
                                     <img class="img-fluid rounded mt-3 mb-2" src="{{ asset('img/staff/Juli.jpg') }}" height="210" width="210" alt="User avatar" />
                                     <div class="user-info text-center">
                                         <h4>Juli Yanti Damanik, S.S.,M.Tesol </h4>
                                     </div>
                                 </div>
                             </div><br>
                             <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                             <div class="info-container">
                                 <ul class="list-unstyled">
                                     <li class="mb-75">
                                         <span>Juli Yanti Damanik obtained her Master's Degree from Monash University, Australia</span>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
    </div>
</div>
@endsection