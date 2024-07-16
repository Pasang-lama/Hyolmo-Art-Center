@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section ">
    <div class="container">
        <div class="wrapper">
            <div class="title">About Hyolmo Art Center.</div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">About us</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="about-us custom-margin">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <div class="page-title">
                    <h1>About Hyolmo Art Center.</h1>
                </div>
                <div class="about-us-content">{!! $aboutus->about_us_description !!}</div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <figure>
                    <img class="d-block w-100" src="{{ ($aboutus->about_us_image != '') && file_exists(public_path('images/aboutus/'.$aboutus->about_us_image)) ? asset('images/aboutus/'.$aboutus->about_us_image) :'images/default.png' }}" alt="About us">
                </figure>
            </div>
        </div>
    </div>
</section>

@endsection