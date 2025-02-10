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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-center about-text wow fadeInDown animate__animated animate__fadeInRight">ZERO1INFINITY
                    INNOVATIONS</h5>
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
                                Accordion Item #1
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-mdb-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is hidden by default,
                                until the collapse plugin adds the appropriate classes that we use to style each
                                element. These classes control the overall appearance, as well as the showing and
                                hiding via CSS transitions. You can modify any of this with custom CSS or
                                overriding our default variables. It's also worth noting that just about any HTML
                                can go within the <strong>.accordion-body</strong>, though the transition does
                                limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="headingTwo">
                            <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                data-mdb-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Accordion Item #2
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-mdb-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by
                                default, until the collapse plugin adds the appropriate classes that we use to
                                style each element. These classes control the overall appearance, as well as the
                                showing and hiding via CSS transitions. You can modify any of this with custom CSS
                                or overriding our default variables. It's also worth noting that just about any
                                HTML can go within the <strong>.accordion-body</strong>, though the transition
                                does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                data-mdb-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-mdb-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                until the collapse plugin adds the appropriate classes that we use to style each
                                element. These classes control the overall appearance, as well as the showing and
                                hiding via CSS transitions. You can modify any of this with custom CSS or
                                overriding our default variables. It's also worth noting that just about any HTML
                                can go within the <strong>.accordion-body</strong>, though the transition does
                                limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
