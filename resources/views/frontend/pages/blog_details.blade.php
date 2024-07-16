@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section ">
    <div class="container">
        <div class="wrapper">
            <div class="title">{{ $title }}</div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Blogs</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="blog-section custom-margin">
    <div class="container">
        <div class="page-title">
            <h1>{{ $title }}</h1>
            <i>{{ date('d F Y', strtotime($blog_details->created_at)) }}</i>
        </div>
        @if (!empty($blog_details->blog_image) && file_exists(public_path('images/blogs/'.$blog_details->blog_image)))
        <figure>
            <img class="d-block w-100" src="{{ asset('images/blogs/'.$blog_details->blog_image) }}" alt="{{ $title }}">
        </figure>
        @endif
            <div class="blog-content-page pt-4">
                <div class="mb-3">
                    {!! $blog_details->blog_description !!}
                </div>
            </div>
            @if($blogs->isNotEmpty())
            <div class="heading custom-margin">
                <h2>Recent Post </h2>
            </div>
            <div class="row gy-4 ">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <a href="{{ route('frontend.blog_details', [$blog->blog_slug]) }}">
                        <div class="blog-card">
                            <div class="card-heading">
                                <figure>
                                    <img class="d-block w-100" src="{{ (($blog->blog_image != '') && file_exists(public_path('images/blogs/'.$blog->blog_image))) ? asset('images/blogs/'.$blog->blog_image) : asset('images/default.png') }}" alt="{{ $blog->blog_title }}">
                                </figure>
                            </div>
                            <div class="card-body">
                                <div class="blog-title">
                                    <h6>{{ Str::words(strip_tags($blog->blog_title), 13)}}</h6>
                                </div>
                                <div class="date">
                                    <span class="day"> {{ date('d F Y', strtotime($blog->created_at)) }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @endif
</section>

@endsection