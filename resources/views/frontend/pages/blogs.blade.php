@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section ">
    <div class="container">
        <div class="wrapper">
            <h1 class="title">Latest Blogs</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Blogs</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="product-categories-section custom-margin">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="blogs-preview-section">
                    <div class="row gy-4">
                        @if($blogs->isNotEmpty())
                        @foreach($blogs as $blog)
                        <div class="col-lg-4 col-md-6 col-sm-12">


                            <a href="{{ route('frontend.blog_details', [$blog->blog_slug]) }}">
                                <div class="blog-card">
                                    <div class="card-heading">
                                        <figure>
                                            <img class="d-block w-100" src="{{ (($blog->blog_image != '') && file_exists(public_path('images/blogs/'.$blog->blog_image))) ? asset('images/blogs/'.$blog->blog_image) : asset('images/default.png') }}" alt="{{ $blog->blog_title }}">
                                        </figure>
                                    </div>
                                    <div class="card-body">
                                        <div class="blog-title">
                                            <h6>{{ $blog->blog_title }}</h6>
                                        </div>
                                        <div class="date">
                                            <span class="day">{{ date('d', strtotime($blog->created_at))}}</span>
                                            <span class="month">{{ date('M', strtotime($blog->created_at))}}</span>
                                            <span class="year">{{ date('Y', strtotime($blog->created_at))}}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        @else
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p>No Blogs Found</p>
                        </div>
                        @endif
                    </div>
                </div>
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</section>
@endsection