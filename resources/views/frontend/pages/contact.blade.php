@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section ">
    <div class="container">
        <div class="wrapper">
            <div class="title">Contact us</div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Contact us</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="contact-info custom-margin">
    <div class="container">


        <div class="row gy-4 ">
            <div class="col-lg-6 col-md-12">
                <div class="page-title">
                    <h1>Contact us</h1>
                </div>
                <div class=" contact-item">
                    <i class="fas fa-location-arrow"></i>
                    <div class="details">
                        <h6>Address</h6>
                        <span>{{ $setting_com->address }}</span>
                    </div>

                </div>
                <div class=" contact-item">
                    <i class="fas fa-mobile"></i>
                    <div class="details">
                        <h6>Mobile</h6>
                        <span>{!! getClickableLinks($setting_com->mobile_number, "phone") !!}</span>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div class="details">
                        <h6>Email</h6>
                        <span>{!! getClickableLinks($setting_com->email, "email") !!}</span>
                    </div>
                </div>

                <div class="page-title mt-5">
                    <h1>Follow us on social media</h1>
                </div>
                <ul class="social-media-icons">
                    @if ($setting_com->facebook_link != null)
                    <li><a href="{{ $setting_com->facebook_link }}" target="_blank"><i class="fab fa-facebook"></i></a></li>
                    @endif
                    @if ($setting_com->instagram_link != null)
                    <li><a href="{{ $setting_com->instagram_link }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    @endif
                    @if ($setting_com->tiktok_link != null)
                    <li><a href="{{ $setting_com->tiktok_link }}" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                    @endif
                    @if ($setting_com->youtube_link != null)
                    <li><a href="{{ $setting_com->youtube_link }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    @endif
                </ul>

            </div>
            <div class="col-lg-6 col-md-12">
                <div class="contact-form">
                    <div class="heading">
                        Drop us a Message
                    </div>
                    <form action="{{route('contact_details') }}" id="homecontact_form" method="POST">
                        @csrf
                        <div class="pt-3">
                            <label for="name">Name*</label><br>
                            <input type="text" name="name" id="name"><br>
                            <span class="error-message pt-3 text-danger"></span>
                        </div>
                        <div class="pt-3">
                            <label for="contact">Contact*</label><br>
                            <input type="number" name="contact" id="contact"><br>
                            <span class="error-message pt-3 text-danger"></span>
                        </div>
                        <div class="pt-3">
                            <label for="email">Email*</label><br>
                            <input type="email" name="email" id="email"><br>
                            <span class="error-message pt-3 text-danger"></span>
                        </div>
                        <div class="pt-3">
                            <label for="message">Message</label><br>
                            <textarea name="message" id="message" cols="30" rows="4"></textarea>
                        </div>
                        <div class="submit-button "><button type="submit" class="send_message_btn">Send Message</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-form-google custom-margin">
    <div class="container">
        <div class="google-map">
            {!! ($setting_com->google_map) !!}
        </div>
    </div>
</section>
@endsection