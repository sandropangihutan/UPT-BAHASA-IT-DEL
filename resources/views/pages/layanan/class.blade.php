@extends('layouts.master')
@section('title', 'Kelas')
@section('content')
<div class="app-content content ">
    <div class="content-body">
        <div class="col-12">
            <div class="card">
                <img src="{{ asset('app-assets/images/banner/EnglishClass.jpg') }}" class="img-fluid card-img-top" alt="Blog Detail Pic">
                <div class="card-body">
                    <center><h1>English Class</h1><br></center>
                        <h4 class="mb-75">English Language Course</h4>
                        <h5 class="mb-75">General English :</h5>
                        <p class="card-text mb-2">
                            The general English course aims to meet the needs of those who intend to improve their communication skills in English both spoken and written, in day to day contexts.
                        </p><br>
                        <h5 class="mb-75">English for specific purposes (ESP)</h5>
                        <p class="card-text mb-2">
                            ESP aims to fulfill the needs of our customers from various sectors.
                        </p><br>
                        <h5 class="mb-75">TOEFL ITP® preparation course </h5>
                        <p class="card-text mb-2">
                            This course is designed to prepare participants for TOEFL ITP®.
                        </p><br>
                        <h5 class="mb-75">IELTS preparation course</h5>
                        <p class="card-text mb-2">
                            This course is designed to prepare participants for IELTS. 
                        </p><br>
                        <h5 class="mb-75">TOEFL ITP Result</h5>
                        <p class="card-text mb-2">
                            All tests are provided by IIEF Jakarta. The score of TOEFL ITP given by IIEF is the score that is officially issued by 
                            Educational Testing Service (ETS), Princeton, United States of America.<br><br>The TOEFL ITP result will be available and 
                            can be directly taken at IT Del campus 3 (three) weeks after the test date. This is due to the process of answer sheet 
                            delivery from IT Del to IIEF and the certificate delivery from IIEF to IT Del.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection