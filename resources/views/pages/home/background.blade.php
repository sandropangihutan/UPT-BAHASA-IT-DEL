@extends('layouts.master')
@section('title', 'Background')
@section('content')
<div class="app-content content ">
    <div class="content-body">
        <div id="user-profile">
            <!-- profile header -->
            <div class="row">
                <div class="col-12">
                    <div class="card profile-header mb-2">
                        <!-- profile cover photo -->
                        <img class="card-img-top" src="{{ asset('app-assets/images/profile/user-uploads/background.png') }}" alt="User Profile Image">
                        <!--/ profile cover photo -->
            
                        <div class="position-relative">
                            <!-- profile picture -->
                            <div class="profile-img-container d-flex align-items-center">
                                <div class="profile-img">
                                    <img src="img/Logo.jpg" class="rounded img-fluid" alt="Card image">
                                </div>
                                <!-- profile title -->
                                <div class="profile-title ms-3">
                                    <h2 class="text-white">UPT Bahasa</h2>
                                    <p class="text-white">IT Del</p>
                                </div>
                            </div>
                        </div>
            
                        <!-- tabs pill -->
                        <div class="profile-header-nav">
                            <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100"></nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Description</h4>
        </div>
        <div class="card-body">
            <p class="card-text">
                The Language Center at Del Institute of Technology provides some programs and services for English skills development and for 
                documents translations. Services for interpreting is also provided as requested.<br><br>
                For individual English skills development, it is initially for preparation to sit an English test either for national or 
                International standard tests. The most wanted English Proficiency Test, TOEFL institutional test, is provided as requested and 
                also provided every year for a fix date to the third year students of IT Del.<br><br>
                Some other services for English professional development are also provided and are grouped into some classes as follows:<br><br>
                1. English for Communication<br>
                2. TOEFL Test Preparation<br>
                3. IELTS Test Preparation<br>
                4. English for Nursing<br>
                5. English for Information Technology<br>
                6. English for Administration and Secretary<br>
                7. English for Oil and Gas<br><br>
                These courses can be ordered in person or for a group of people sharing the same interest for a specific course.<br><br>
                Those above mentioned services are offered not only to Del students and staff but also to the general public in the local
                community and beyond.
            </p>
        </div>
    </div>    
</div>
@endsection