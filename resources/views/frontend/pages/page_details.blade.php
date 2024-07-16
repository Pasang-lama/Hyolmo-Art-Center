@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section ">
    <div class="container">
        <div class="wrapper">
            <div class="title">{{ $title }}</div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="new-pages-section custom-margin">
    <div class="container">
        <div class="row gy-4">
            <div class="col-12">
                <div class="page-title">
                    <h1>{{ $title }}</h1>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12">
                <div class="new-pages-content">{!! $page_details->page_description !!}</div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                @if (!empty($page_details->page_image) && file_exists(public_path('images/pages/'.$page_details->page_image)))
                <figure>
                    <img class="d-block w-100" src="{{ asset('images/pages/'.$page_details->page_image) }}" alt="{{ $title }}">
                </figure>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection