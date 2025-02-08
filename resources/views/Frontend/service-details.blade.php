@extends('Frontend.Common.baseLayout')
@section('section')
    <div class="container-fluid service-breadcrumb"
        style="background-image: url({{ URL::asset('frontend/assets/images/services-banner/services-background.jpg') }})">
        <div class="breadcrumb-container wow fadeInDown animate__animated animate__fadeInDown">
            <h2 class="fw-bold text-dark">{{ $service->name ? $service->name : '' }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp animate__animated animate__fadeInUp breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $service->name ? $service->name : '' }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5 mb-3">
            <div class="col-md-8 wow fadeInDown animate__animated animate__fadeInLeft">
                <img class="img-fluid mb-3" src="{{ URL::asset('assets/uploads/services/' . $service->image) }}"
                    alt="{{ $service->name ? $service->name : '' }}" id="service-image" />
                {!! $service->full_desc !!}
            </div>
            <div class="col-md-4  wow fadeInDown animate__animated animate__fadeInRight">
                <h2 class="service-header">Other Services</h2>
                <ul class="service-list">
                    @foreach ($services as $service)
                        @php
                            $serviceLink = explode(' ', $service->name);
                            $serviceLink = strtolower(implode('-', $serviceLink));
                        @endphp
                        <li class="service-list-item">
                            <i class="bi bi-check-lg me-2"></i> <a
                                href="{{ route('serviceDetails', ['serviceName' => $serviceLink]) }}">{{ $service->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @if (!empty($features))
            <div class="row">
                <div class="col-md-12 wow fadeInDown animate__animated animate__fadeInLeft">
                    <h2 class="text-center">Features That We Provide In <span class="text-warning">Web Development</span>
                    </h2>
                </div>
            </div>
            <div class="row">
                @foreach ($features as $feature)
                    <div class="col-md-6 wow fadeInDown animate__animated @if($loop->iteration % 2 == 0) animate__fadeInRight @else animate__fadeInLeft @endif">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-2 d-flex align-items-center justify-content-center">
                                    <img src="{{ URL::asset('assets/uploads/features/' . $feature->icon) }}" alt="{{ $feature->name }}" class="img-fluid rounded-start feature-image" />
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $feature->name }}</h5>
                                        <p class="card-text feature-desc">
                                            {{ $feature->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
