<footer class="custom-margin">
    <div class="container">
        <div class="row ">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="contact-us-info">
                    <li>
                        <h6>{{ env('APP_NAME') }}</h6>
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <a>
                            {{ $setting_com->address }}
                        </a>
                    </li>
                    <li><i class="fas fa-envelope"></i>
                        <div class="wrapper">
                            {!! getClickableLinks($setting_com->email, "email") !!}
                        </div>
                    </li>
                    <li>

                        <i class="fas fa-phone-alt"></i>
                        <div class="wrapper">
                            {!! getClickableLinks($setting_com->phone_number, "phone") !!}
                        </div>
                    </li>
                    <li>
                        <i class="fas fa-mobile-alt"></i>
                        <div class="wrapper">
                            {!! getClickableLinks($setting_com->mobile_number, "phone") !!}
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <ul>
                    <li>
                        <h6>Quicks Links</h6>
                    </li>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('frontend.aboutus') }}">About us</a></li>
                    <li><a href="{{ route('frontend.blogs') }}">Our latest Blogs</a></li>
                    <li><a href="{{ route('frontend.pages_details',['return-refunds']) }}">Return & Refunds</a></li>
                    <li><a href="{{ route('frontend.pages_details',['terms-condition']) }}">Terms & Condition</a></li>
                    <li><a href="{{ route('frontend.pages_details',['privacy-policy']) }}">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <ul>
                    <li>
                        <h6>Our Art Categories</h6>
                    </li>
                    @if($categories->isNotEmpty())
                    @php($categories = $categories->take(4))
                    @foreach($categories as $category)
                    <li>
                        <a href="{{ route('category', [$category->slug]) }}">
                            {{ $category->category_name }}
                        </a>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="copy-right">

        <div class="container">
            <p>Copyright © 2024 {{ env('APP_NAME') }}. All Rights Reserved.</p>
            <p>Design and Developed by: <a href="https://www.pasang-lama.com.np/" target="_blank">Pasang Lama</a></p>
        </div>
    </div>
</footer>