<header>
    <div class="main-header ">
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <div class="container">
                <a class="logo" href="{{ route('home') }}">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="{{ env('APP_NAME') }}">
                </a>
                <button class="navbar-toggler side-nav-show-btn">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="mysidenav" id="mysidenav">
                    <button class="navbar-toggler side-nav-close-btn">
                        <span class="navbar-toggler-icon"><i class="fas fa-times"></i></span>
                    </button>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('about-us') ? 'active' : '' }}" href="{{ route('frontend.aboutus') }}">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('blogs') ? 'active' : '' }}" href="{{ route('frontend.blogs') }}"> Latest Blogs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                                Contact us
                            </a>
                        </li>
                    </ul>
                    <div class="text-end contact-number">
                        <span class="text-label">Available 24/7 at</span><br>
                        <span class="number">{{ $setting_com->mobile_number }}</span>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>