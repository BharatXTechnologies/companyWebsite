<footer class="py-5" style="background: #fcf9f4;">
    <div class="container wow animate__animated animate__fadeInUp">
        <div class="row">
            <div class="col-md-6">
                <h4><strong>Zero१Infinity</strong> <span style="color: #003366;">Innovations</span></h4>
                <p>Noida, UP India</p>
                <p>Email: <a href="mailto:info@digicoders.in">info@z1iinnovation.com</a></p>
                <p><strong>8726904066, 8650163913</strong></p>
            </div>
            <div class="col-md-4">
                <h5>IT Services</h5>
                <ul class="list-unstyled">
                    @if (!empty($services))
                        @foreach ($services as $service)
                            @php
                                $serviceLink = explode(" ", $service->name);
                                $serviceLink = strtolower(implode('-', $serviceLink));
                            @endphp
                            <li><a href="{{ route('serviceDetails', ['serviceName' => $serviceLink]) }}">{{ $service->name }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="col-md-2">
                <h5>Support</h5>
                <ul class="list-unstyled">
                    <li><a href="">Request a Proposal</a></li>
                    <li><a href="">Talk to Expert</a></li>
                    <li><a href="">Help & FAQ</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Pricing & Packages</a></li>
                    <li><a href="">Blogs</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
            <p>&copy; 2025 to Zero१Infinity Innovations. All Rights Reserved.</p>
            <div>
                <a href="#"><i class="fab fa-twitter fa-lg mx-2"></i></a>
                <a href="#"><i class="fab fa-facebook fa-lg mx-2"></i></a>
                <a href="#"><i class="fab fa-instagram fa-lg mx-2"></i></a>
                <a href="#"><i class="fab fa-linkedin fa-lg mx-2"></i></a>
            </div>
        </div>
    </div>
</footer>
