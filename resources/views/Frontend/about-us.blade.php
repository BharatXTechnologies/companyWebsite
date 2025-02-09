@extends('Frontend.Common.baseLayout')
@section('section')
    <div class="container-fluid service-breadcrumb"
        style="background-image: url({{ URL::asset('frontend/assets/images/services-banner/services-background.jpg') }})">
        <div class="breadcrumb-container wow fadeInDown animate__animated animate__fadeInDown">
            <h2 class="fw-bold text-dark">{{ $pageTitle ? ucwords($pageTitle) : 'About Zero1Infinity' }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp animate__animated animate__fadeInUp breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="letter-spacing: 0.2ch;">{{ $pageTitle ? strtoupper($pageTitle) : 'ABOUT ZERO1INFINITY' }}</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection