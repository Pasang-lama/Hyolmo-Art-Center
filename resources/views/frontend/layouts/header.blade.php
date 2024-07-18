<header>
    <div class="main-header ">
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="{{ env('APP_NAME') }}">
                    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                    <!-- @include('frontend.layouts.auth')
                    <div class="profile-wishlist-cart">
                        <div class="nav-Search-bar">
                            <form action="{{route('frontend.site_search')}}" class="toggle-searchbar" method="get">
                                <div class="search-box-wrapper">
                                    <i class="fa sticky-search-icon fa-search" aria-hidden="true"></i>
                                    <div class="search-box">
                                        <input type="text" name="keywords" placeholder="Search the Store" autocomplete="off">
                                        <input type="submit" value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="profile loggedin_menu" style="display: none;">
                            <a href="{{ route('customer.dashboard') }}"> <i class="fas fa-user"></i></a>
                        </div>
                        <div class="wishlist loggedin_menu" style="display: none;">
                            <a class="position-relative" href="{{ route('customer.wishlist.index') }}">
                                <i class="fas fa-heart"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge " id="wishlist-count">
                                    {{ $wishlist_count }}
                                </span>
                            </a>
                        </div>
                        <div class="cart loggedin_menu" style="display: none;">
                            <a class="position-relative" href="{{ route('customer.cart.index') }}">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge" id="cart-count">
                                    {{ $cart_count }}
                                </span>
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>
        </nav>
    </div>
</header>