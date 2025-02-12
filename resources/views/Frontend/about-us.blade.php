@extends('Frontend.Common.baseLayout')
@section('section')
    <div class="container-fluid service-breadcrumb mb-5"
        style="background-image: url({{ URL::asset('frontend/assets/images/services-banner/services-background.jpg') }})">
        <div class="breadcrumb-container wow fadeInDown animate__animated animate__fadeInDown">
            <h2 class="fw-bold text-dark">{{ $pageTitle ? ucwords($pageTitle) : 'About Zero1Infinity' }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp animate__animated animate__fadeInUp breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="letter-spacing: 0.2ch;">
                        {{ $pageTitle ? strtoupper($pageTitle) : 'ABOUT ZERO1INFINITY' }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container about-container mb-5">
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-center text-muted about-text wow fadeInDown animate__animated animate__fadeInRight">
                    ZERO1INFINITY INNOVATIONS</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="about-us wow fadeInDown animate__animated animate__fadeInLeft">
                    We are driven by passion and innovation, <br />building a future where <span
                        class="text-warning">skilled minds</span> come together to <br />create something <span
                        class="text-warning">extraordinary</span>.
                </h2>
            </div>
        </div>
        <div class="row align-items-center justify-content-center mt-4">
            <div class="col-md-4 text-center wow fadeInDown animate__animated animate__fadeInLeft mb-2">
                <span class="experience-number">Results Matter</span>
                <p class="text-muted text-uppercase subtext">Let’s Scale Your Business with Data-Driven Growth</p>
            </div>
            <div class="col-md-5 wow animate__animated animate__fadeInRight mb-4">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingOne">
                            <button data-mdb-collapse-init class="accordion-button" type="button"
                                data-mdb-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                How can we help your business?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-mdb-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Through our innovative team and technology expert team, we can put your business online
                                    and can help you to reach more customers to grow your business, we know how to use
                                    technology to change people's life.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingTwo">
                            <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                data-mdb-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                What are the advantages of Zero1infinity?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-mdb-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>We have the young and energetic developers and designers with most innovative ideas to
                                    implement your idea into reality, We at <strong>Z1I</strong>, belieave in that client
                                    satisfaction is the key to success, we provide 24x7 technical support.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                data-mdb-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                How working process is simplified?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-mdb-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>We have experienced devlopers to help you in the implementing your idea, We analyse,
                                    design, develop, test and deploy your requirement.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5 claim-container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center about-us wow fadeInDown animate__animated animate__fadeInLeft">How We Claim To <span class="text-warning">Best?</span></h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4 mb-4 wow fadeInDown animate__animated animate__fadeInLeft">
                <div class="card about-card">
                    <img src="{{ URL::asset('frontend/assets/images/about-images/about-team.png') }}" class="card-img-top" alt="Innovative Teams"/>
                    <div class="card-body">
                        <h5 class="card-title text-center">Innovative Teams</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 wow fadeInDown animate__animated animate__fadeInUp">
                <div class="card about-card">
                    <img src="{{ URL::asset('frontend/assets/images/about-images/client-feedback.png') }}" class="card-img-top" alt="Client Satisfaction"/>
                    <div class="card-body">
                        <h5 class="card-title text-center">Client Satisfaction</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 wow fadeInDown animate__animated animate__fadeInRight">
                <div class="card about-card">
                    <img src="{{ URL::asset('frontend/assets/images/about-images/on-time.png') }}" class="card-img-top" alt="Quick Delivery"/>
                    <div class="card-body">
                        <h5 class="card-title text-center">Quick Delivery</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4 mb-4 wow fadeInDown animate__animated animate__fadeInLeft">
                <div class="card about-card">
                    <img src="{{ URL::asset('frontend/assets/images/about-images/affordable.png') }}" class="card-img-top" alt="Affordable Price"/>
                    <div class="card-body">
                        <h5 class="card-title text-center">Affordable Price</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 wow fadeInDown animate__animated animate__fadeInDown">
                <div class="card about-card">
                    <img src="{{ URL::asset('frontend/assets/images/about-images/increase.png') }}" class="card-img-top" alt="Less budget more features"/>
                    <div class="card-body">
                        <h5 class="card-title text-center">Less budget more features</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 wow fadeInDown animate__animated animate__fadeInRight">
                <div class="card about-card">
                    <img src="{{ URL::asset('frontend/assets/images/about-images/24-hours-support.png') }}" class="card-img-top" alt="24*7 Support"/>
                    <div class="card-body">
                        <h5 class="card-title text-center">24/7 Support</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
