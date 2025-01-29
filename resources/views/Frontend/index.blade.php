@extends('Frontend.Common.baseLayout')
@section('section')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 hero-content">
                    <h1 class="display-4 fw-bold">Join the Future with Young Innovators</h1>
                    <p class="lead">Collaborate with engineers, entrepreneurs, and creative minds to shape the world of tomorrow.</p>
                    <a href="#" class="btn btn-primary btn-custom">Get Quotation</a>
                    <a href="#" class="btn btn-success btn-custom">Company Profile</a>
                </div>
                <div class="col-md-6">
                    <img src="{{ URL::asset('frontend/assets/images/banner/hero-banner.png') }}" alt="Team Illustration" class="illustration">
                </div>
            </div>
        </div>
    </section>
@endsection
