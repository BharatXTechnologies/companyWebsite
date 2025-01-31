@extends('Frontend.Common.baseLayout')
@section('section')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-1"></div>
                <div class="col-md-6 hero-content">
                    <h1 class="display-4 fw-bold">Join the Future with Young Innovators</h1>
                    <p class="lead">Collaborate with engineers, entrepreneurs, and creative minds to shape the world of
                        tomorrow.</p>
                    <a href="#" class="btn btn-primary btn-custom">Get Quotation</a>
                    <a href="#" class="btn btn-success btn-custom">Company Profile</a>
                </div>
                <div class="col-md-4">
                    <img src="{{ URL::asset('frontend/assets/images/banner/hero-banner.png') }}" alt="Team Illustration"
                        class="illustration">
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section class="about-section">
        <p class="text-uppercase text-muted mb-3 animate__animated animate__fadeInDown company-name">Zero१infinity
            Innovations</p>
        <h2 class="about-title animate__animated animate__fadeIn text-center">We provide all kinds of IT services that <br>
            will boost your <span class="highlight-text">BUSINESS</span></h2>

        <div class="row align-items-center justify-content-center mt-4">
            <div class="col-md-4 text-center animate__animated animate__zoomIn mb-2">
                <span class="experience-number">Results Matter</span>
                <p class="text-muted text-uppercase subtext">Let’s Scale Your Business with Data-Driven Growth</p>
            </div>
            <div class="col-md-3 animate__animated animate__fadeInRight">
                <p class="text-muted">
                    Zero१infinity, an organization where we totally focus on business development of our clients.
                    Our motto is to provide consulting and IT solutions for your business growth. We are pleased
                    to serve you more and more from Zero१infinity. Want to know more about us?
                </p>
                <a href="#" class="discover-btn text-primary">Discover now →</a>
            </div>
        </div>
    </section>
    <div class="container py-5">
        <div class="row text-center">
            <!-- Card 1 -->
            <div class="col-md-4 mb-4 wow animate__animated animate__fadeIn" data-wow-delay="0.2s">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="icon-box mb-3">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="card-title">Who We Are?</h5>
                        <p class="card-text">Zero१infinity Innovations is a development service provider company in India.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="discover-btn">Discover now →</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4 mb-4 wow animate__animated animate__fadeIn" data-wow-delay="0.4s">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="icon-box mb-3">
                            <i class="bi bi-code"></i>
                        </div>
                        <h5 class="card-title">What We Do</h5>
                        <p class="card-text">We provide IT solutions like Software, Website, and Mobile Application
                            Development, SEO and Digital Marketing.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="discover-btn">Discover now →</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 mb-4 wow animate__animated animate__fadeIn" data-wow-delay="0.6s">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="icon-box mb-3">
                            <i class="fa fa-cogs"></i>
                        </div>
                        <h5 class="card-title">How We Do It</h5>
                        <p class="card-text">At Zero१infinity, we work with engineers and developers to build
                            innovative solutions.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="discover-btn">Discover now →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- services section --}}
    <div class="container py-5 mb-4">
        <div class="text-center mb-5 wow animate__animated animate__fadeInUp">
            <h5 class="text-uppercase text-muted">An Umbrella Solution For All IT Needs</h5>
            <h2>Reach out to the world’s most <span class="text-primary">reliable IT services.</span></h2>
        </div>
        <div class="row text-center">
            <!-- Card 1 -->
            <div class="col-md-4 mb-4 wow animate__animated animate__fadeIn" data-wow-delay="0.2s">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="icon-box mb-3">
                            <i class="fa-solid fa-laptop-code"></i>
                        </div>
                        <h5 class="card-title">Software Development</h5>
                        <p class="card-text">We provide custom software development for your business, billing, inventory,
                            and other custom needs.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="discover-btn">Discover now →</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4 mb-4 wow animate__animated animate__fadeIn" data-wow-delay="0.4s">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="icon-box mb-3">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h5 class="card-title">Website Development</h5>
                        <p class="card-text">We provide website design & development to make your business drive more
                            customers and sales.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="discover-btn">Discover now →</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 mb-4 wow animate__animated animate__fadeIn" data-wow-delay="0.6s">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="icon-box mb-3">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h5 class="card-title">Mobile App Development</h5>
                        <p class="card-text">We provide Android & iOS app development, turning ideas into reality for your
                            startup.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="discover-btn">Discover now →</a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-4 mb-4 wow animate__animated animate__fadeIn" data-wow-delay="0.8s">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="icon-box mb-3">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <h5 class="card-title">Digital Marketing</h5>
                        <p class="card-text">We offer digital marketing services to drive more traffic to your mobile app
                            or website and boost sales.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="discover-btn">Discover now →</a>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-4 mb-4 wow animate__animated animate__fadeIn" data-wow-delay="1s">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="icon-box mb-3">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <h5 class="card-title">Graphics Design</h5>
                        <p class="card-text">We create stunning graphics to keep your customers engaged through promotional
                            banners, offers, and more.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="discover-btn">Discover now →</a>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-4 mb-4 wow animate__animated animate__fadeIn" data-wow-delay="1.2s">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="icon-box mb-3">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h5 class="card-title">Maintenance Services</h5>
                        <p class="card-text">We provide reliable annual maintenance services for your website, software,
                            erp, crm or mobile application.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="discover-btn">Discover now →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5 mb-5 wow animate__animated animate__fadeInUp" data-wow-duration="1.2s">
        <div class="row">
            <div class="col-md-5 wow animate__animated animate__fadeInLeft pt-5" data-wow-duration="1.5s">
                <h2 style="font-weight: bold; border-left: 5px solid #c49a85; padding-left: 1rem; font-size: 2rem;">
                    Obtaining further information by <span style="color: #003366;">dropping a message</span> to our
                    experienced IT professionals.</h2>
                <p class="mt-4">We’re available for 16 hours a day!<br />
                    Contact will require a detailed analysis and assessment of your plan. Our experienced team can provide
                    the best estimation for technology and budget based on your requirements.</p>
            </div>
            <div class="col-md-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.5s">
                <form action="" method="post" class="shadow-lg p-4 rounded bg-white">
                    <div class="row mb-1">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="name"
                                class="form-control wow animate__animated animate__fadeIn animate__delay-1s"
                                placeholder="Your Name" data-wow-duration="1s">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" name="email"
                                class="form-control wow animate__animated animate__fadeIn animate__delay-2s"
                                placeholder="Your Email" data-wow-duration="1.2s">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="text" name="phone"
                                class="form-control wow animate__animated animate__fadeIn animate__delay-3s"
                                placeholder="Phone Number" data-wow-duration="1.3s">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="text" name="subject"
                                class="form-control wow animate__animated animate__fadeIn animate__delay-3s"
                                placeholder="Subject" data-wow-duration="1.3s">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <textarea class="form-control wow animate__animated animate__fadeIn animate__delay-4s" name="message" rows="5"
                                placeholder="Your Message" data-wow-duration="1.4s"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="submit" value="Get a free consultation"
                                class="btn btn-warning btn-block wow animate__animated animate__bounceInUp"
                                data-wow-duration="1s" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- project section --}}
    <div class="container py-5 wow animate__animated animate__fadeInUp" data-wow-duration="1s">
        <h2 class="text-center font-weight-bold mb-4 wow animate__animated animate__fadeInLeft">A Glimpse of Excellence: <span class="text-primary">Our Portfolio</span></h2>

        <!-- Tabs for Categories -->
        <ul class="nav nav-pills mb-4 justify-content-center">
            <li class="nav-item wow animate__animated animate__fadeInLeft">
                <a class="nav-link active" data-filter="all">All</a>
            </li>
            <li class="nav-item wow animate__animated animate__fadeInUp">
                <a class="nav-link" data-filter="app">App Development</a>
            </li>
            <li class="nav-item wow animate__animated animate__fadeInDown">
                <a class="nav-link" data-filter="web">Web Development</a>
            </li>
            <li class="nav-item wow animate__animated animate__fadeInRight">
                <a class="nav-link" data-filter="software">Software</a>
            </li>
            <li class="nav-item wow animate__animated animate__fadeInUp">
                <a class="nav-link" data-filter="seo">SEO</a>
            </li>
        </ul>

        <!-- Project Gallery -->
        <div class="row">
            <div class="col-md-4 mb-4 project-card app wow animate__animated animate__fadeInLeft">
                <div class="project-item">
                    <img src="{{ URL::asset('frontend/assets/images/projects/project4.png') }}" class="img-fluid" alt="App Project 1">
                    <div class="overlay">
                        <a href="#" class="project-name">App Project 1</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 project-card web wow animate__animated animate__fadeInDown">
                <div class="project-item">
                    <img src="{{ URL::asset('frontend/assets/images/projects/project.png') }}" class="img-fluid" alt="Web Project 1">
                    <div class="overlay">
                        <a href="#" class="project-name">Web Project 1</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 project-card software wow animate__animated animate__fadeInRight">
                <div class="project-item">
                    <img src="{{ URL::asset('frontend/assets/images/projects/project1.png') }}" class="img-fluid" alt="Software Project 1">
                    <div class="overlay">
                        <a href="#" class="project-name">Software Project 1</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 project-card seo wow animate__animated animate__fadeInLeft">
                <div class="project-item">
                    <img src="{{ URL::asset('frontend/assets/images/projects/project2.png') }}" class="img-fluid" alt="SEO Project 1">
                    <div class="overlay">
                        <a href="#" class="project-name">SEO Project 1</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 project-card app wow animate__animated animate__fadeInUp">
                <div class="project-item">
                    <img src="{{ URL::asset('frontend/assets/images/projects/project3.png') }}" class="img-fluid" alt="App Project 2">
                    <div class="overlay">
                        <a href="#" class="project-name">App Project 2</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 project-card web wow animate__animated animate__fadeInRight">
                <div class="project-item">
                    <img src="{{ URL::asset('frontend/assets/images/projects/project4.png') }}" class="img-fluid" alt="Web Project 2">
                    <div class="overlay">
                        <a href="#" class="project-name">Web Project 2</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const filters = document.querySelectorAll(".nav-link");
            const projects = document.querySelectorAll(".project-card");

            filters.forEach(filter => {
                filter.addEventListener("click", function() {
                    filters.forEach(btn => btn.classList.remove("active"));
                    this.classList.add("active");

                    const category = this.getAttribute("data-filter");

                    projects.forEach(project => {
                        if (category === "all" || project.classList.contains(category)) {
                            project.style.display = "block";
                        } else {
                            project.style.display = "none";
                        }
                    });
                });
            });
        });
    </script>
@endsection
