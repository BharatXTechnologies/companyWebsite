<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="{{ URL::asset('frontend/assets/images/logo/z1i-icon.png') }}" title="Zero1infinity Innovations" alt="Z1i Logo">
        </a>

        <!-- Toggle Button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Services</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Web Development</a></li>
                        <li><a class="dropdown-item" href="#">App Development</a></li>
                        <li><a class="dropdown-item" href="#">SEO Services</a></li>
                        <li><a class="dropdown-item" href="#">Digital Marketing</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <a href="#" class="btn btn-custom ms-3">Get Started</a>
        </div>
    </div>
</nav>
