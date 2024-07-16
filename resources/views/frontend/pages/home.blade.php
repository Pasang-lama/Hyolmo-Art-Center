@extends('frontend.layouts.master')
@section('seo')
<title>{{ $setting_com->name }}</title>
<meta name="description" content="{{ $setting_com->description }}">
<meta name="keywords" content="{{ $setting_com->description }}">
<meta property='og:title' content="{{ $setting_com->name }}">
<meta property="og:description" content="{{ $setting_com->description }}" />
<meta property="og:image" content="{{ asset('images/' . $setting_com->logo) }}" />
@endsection
@section('content')
@if($banners->count() > 0)
<section class="banner ">
   <div class="banner-slider">
      @foreach($banners as $banner)
      @if(($banner->image != '') && file_exists(public_path('images/'.$banner->image)))
      <div class="banner-slider-items">
         <figure>
            <img class="w-100 d-block" src="{{ asset('images/'.$banner->image) }}" alt="{{ $banner->name }}">
         </figure>
         <div class="banner-title">{{ $banner->name }}</div>
      </div>
      @endif
      @endforeach
   </div>
</section>
@endif
@if($aboutus->about_us_description != '' || $aboutus->about_us_image != '')
<section class="about-us custom-margin">
   <div class="container">
      <div class="row align-items-center  gy-4">
         <div class="col-md-6 col-sm-12  wow fadeInLeft animated">
            <div class="heading">
               <h1>About us Hyolmo Art Center</h1>
            </div>
            <p>
               {{ Str::words(strip_tags($aboutus->about_us_description), 100) }}
            </p>
            <div class="button mt-5">
               <a href="{{ route('frontend.aboutus') }}"> Read more</a>
            </div>
         </div>
         <div class="col-md-6 col-sm-12  wow fadeInRight animated ">
            <figure>
               <img class="d-block w-100" src="{{ ($aboutus->about_us_image != '') && file_exists(public_path('images/aboutus/'.$aboutus->about_us_image)) ? asset('images/aboutus/'.$aboutus->about_us_image) :'images/default.png' }}" alt="About us">
            </figure>
         </div>
      </div>
   </div>
</section>
@endif
@if($trending_products->isNotEmpty())
<section class="trending-section d-none custom-margin wow fadeInDown animated">
   <div class="container">
      <div class="heading">
         <h2>TRENDING</h2>
      </div>
      <div class="product-slider">
         @foreach($trending_products as $trending_product)
         <div class="product-card" data-pcount="{{ $loop->iteration}}" data-section="numberTrendingProduct">
            <div class="card-heading">
               <a href="{{ route('main_product', [$trending_product->slug]) }}">
                  <figure>
                     <img class="d-block w-100" src="{{ ($trending_product->product_image != '') && file_exists(public_path('images/'.$trending_product->product_image)) ? asset('images/'.$trending_product->product_image) : asset('images/default.png') }}" alt="{{ $trending_product->product_name }}">
                  </figure>
               </a>
               <div class="hover-content">
                  <ul>
                     <li class="Wishlist add-to-wishlist" data-pcount="{{ $loop->iteration}}" data-section="numberTrendingProduct"><a data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist" href=""><i class="far fa-heart"></i></a></li>
                     <li class="View-details"><a data-bs-toggle="tooltip" data-bs-placement="left" title="View details" href="{{ route('main_product', [$trending_product->slug]) }}"><i class="fas fa-search"></i></a></li>
                     {{--
                     <li class="Compare"><a data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Add to Compare" href=""><i class="fas fa-sync-alt"></i></a></li>
                     --}}
                  </ul>
               </div>
               @if(($trending_product->discount_percent != '') || ($trending_product->discount_percent > 0))
               <div class="sale">
                  <span>-{{ $trending_product->discount_percent }}%</span>
               </div>
               @endif
            </div>
            <div class="card-body">
               <h6 class="text-center">{{ $trending_product->product_name }}</h6>
               <div class="rating text-center">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half"></i>
               </div>
               <div class="price text-center py-1">
                  @if($trending_product->special_price > 0)
                  <span class="text-decoration-line-through text-muted pe-1">
                     {{ env('DEFAULT_CURRENCY_SYMBOL','Rs.') }}{{ (formatcurrency($trending_product->regular_price,'NPR')) }}
                  </span>
                  <span>
                     {{ env('DEFAULT_CURRENCY_SYMBOL','Rs.') }}{{ (formatcurrency($trending_product->special_price,'NPR')) }}
                     @php($product_price = $trending_product->special_price)
                  </span>
                  @else
                  <span>
                     {{ env('DEFAULT_CURRENCY_SYMBOL','Rs.') }}{{ (formatcurrency($trending_product->regular_price,'NPR')) }}
                     @php($product_price = $trending_product->regular_price)
                  </span>
                  @endif
               </div>
               <div class="add-to-cart-button">
                  <form>
                     <div id="numberTrendingProductDiv{{ $loop->iteration}}" class="product-sizes-listing d-none value-button">
                        {{ getProductAttr($trending_product->id, 'size') }}
                     </div>

                     <div class="value-button" id="decrease" onclick="decreaseValue('numberTrendingProduct',{{ $loop->iteration}})" value="Decrease Value"> -
                     </div>

                     <input type="number" id="numberTrendingProduct{{ $loop->iteration}}" value="1" class="product_qty" data-id="{{ $trending_product->id }}" data-sp="{{ $product_price }}" data-title="{{ $trending_product->product_name }}" data-size="{{ getProductAttr($trending_product->id, 'size') }}" data-stock="{{ getProductAttr($trending_product->id, 'stock') }}" />

                     <div class="value-button" id="increase" onclick="increaseValue('numberTrendingProduct',{{ $loop->iteration}})" value="Increase Value"> +
                     </div>
                     <button class="Add-to-card value-button addToCartAjax" data-pcount="{{ $loop->iteration}}" data-section="numberTrendingProduct">Add to Cart</button>
                  </form>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
@endif
@if($homepageextras->homepageextra_bannerimage != '' && file_exists(public_path('images/homepageextra/'.$homepageextras->homepageextra_bannerimage)))
<section class="highlight custom-margin  wow fadeInDown animated">
   <a @if($homepageextras->homepageextra_bannerlink != '') href="{{ $homepageextras->homepageextra_bannerlink }}" target="_blank" @endif>
      <figure>
         <img class="w-100 d-block" src="{{ asset('images/homepageextra/'.$homepageextras->homepageextra_bannerimage) }}" alt="{{ env('APP_NAME') }}">
      </figure>
   </a>
</section>
@endif

@if($latest_products->count() > 0)
<section class="trending-section new-arrivals d-none custom-margin wow fadeInDown animated">
   <div class="container">
      <div class="heading">
         <h2>New arrivals</h2>
      </div>
      <div class="product-slider">
         @foreach($latest_products as $latest_product)
         <div class="product-card" data-pcount="{{ $loop->iteration}}" data-section="numberNewArrivals">
            <div class="card-heading">
               <a href="{{ route('main_product', [$latest_product->slug]) }}">
                  <figure>
                     <img class="d-block w-100" src="{{ ($latest_product->product_image != '') && file_exists(public_path('images/'.$latest_product->product_image)) ? asset('images/'.$latest_product->product_image) : asset('images/default.png') }}" alt="{{ $latest_product->product_name }}">
                  </figure>
               </a>
               <div class="hover-content">
                  <ul>
                     <li class="Wishlist add-to-wishlist"><a data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist" href=""><i class="far fa-heart "></i></a></li>
                     <li class="View-details"><a data-bs-toggle="tooltip" data-bs-placement="left" title="View details" href="{{ route('main_product', [$latest_product->slug]) }}"><i class="fas fa-search"></i></a></li>
                     {{--
                     <li class="Compare"><a data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Add to Compare" href=""><i class="fas fa-sync-alt"></i></a></li>
                     --}}
                  </ul>
               </div>
               @if(($latest_product->discount_percent != '') || ($latest_product->discount_percent > 0))
               <div class="sale">
                  <span>-{{ $latest_product->discount_percent }}%</span>
               </div>
               @endif
            </div>
            <div class="card-body">
               <h6 class="text-center">{{ $latest_product->product_name }}</h6>
               <div class="rating text-center">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half"></i>
               </div>
               <div class="price text-center py-1">
                  @if($latest_product->special_price > 0)
                  <span class="text-decoration-line-through text-muted pe-1">
                     {{ env('DEFAULT_CURRENCY_SYMBOL','Rs.') }}{{ (formatcurrency($latest_product->regular_price,'NPR')) }}
                  </span>
                  <span>
                     {{ env('DEFAULT_CURRENCY_SYMBOL','Rs.') }}{{ (formatcurrency($latest_product->special_price,'NPR')) }}
                     @php($product_price = $latest_product->special_price)

                  </span>
                  @else
                  <span>
                     {{ env('DEFAULT_CURRENCY_SYMBOL','Rs.') }}{{ (formatcurrency($latest_product->regular_price,'NPR')) }}
                     @php($product_price = $latest_product->regular_price)

                  </span>
                  @endif
               </div>
               <div class="add-to-cart-button">
                  <form>

                     <div id="numberNewArrivalsDiv{{ $loop->iteration}}" class="product-sizes-listing d-none value-button">
                        {{ getProductAttr($latest_product->id, 'size') }}
                     </div>

                     <div class="value-button" id="decrease" onclick="decreaseValue('numberNewArrivals',{{$loop->iteration}})" value="Decrease Value">-
                     </div>

                     <input type="number" id="numberNewArrivals{{$loop->iteration}}" value="1" class="product_qty" data-id="{{ $latest_product->id }}" data-sp="{{ $product_price }}" data-title="{{ $latest_product->product_name }}" data-size="{{ getProductAttr($latest_product->id, 'size') }}" data-stock="{{ getProductAttr($latest_product->id, 'stock') }}" />

                     <div class="value-button" id="increase" onclick="increaseValue('numberNewArrivals',{{$loop->iteration}})" value="Increase Value">+
                     </div>
                     <button class="Add-to-card value-button addToCartAjax" data-pcount="{{ $loop->iteration }}" data-section="numberNewArrivals">Add to Cart</button>
                  </form>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
@endif

@if($featuredCategories->isNotEmpty())
<section class="categories-section custom-margin">
   <div class="container">
   <div class="heading">
         <h2>Our Art Category </h2>
      </div>
      <div class="row gy-4 justify-content-center">
         @foreach($featuredCategories as $featuredCategory)
         <div class="col-lg-4 col-md-6 col-sm-12 men-section   {{ ($loop->index == 0) ? 'animated fadeInLeft wow' : 'animated fadeInRight wow' }}">
            <div class="categories">
               <figure>
                  <img class="w-100 d-block" src="{{ ($featuredCategory->category_image != '') && file_exists(public_path('images/'.$featuredCategory->category_image)) ? asset('images/'.$featuredCategory->category_image) : asset('images/default.png') }}" alt="{{ $featuredCategory->category_name }}">
               </figure>
               <div class="categories-name">
                  <h3> <a href="{{ route('category', [$featuredCategory->slug ]) }}"> {{ $featuredCategory->category_name }} </a></h3>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
@endif
<section class="new-feature custom-margin wow fadeInDown animated">
   <div class="container ">
      <div class="row align-items-center row-contain">
         <div class="col-lg-6 col-md-6 col-sm-12 text-contain  animated fadeInLeft wow ">
            {!! $homepageextras->homepageextra_shortdescription !!}
            <div class="button mt-5">
               <a @if($homepageextras->homepageextra_shortdescriptionlink != '') href="{{ $homepageextras->homepageextra_shortdescriptionlink }}" target="_blank" @endif>
                  Explore More
               </a>

            </div>
         </div>
         @if($homepageextras->homepageextra_shortdescriptionimg != '' && file_exists(public_path('images/homepageextra/'.$homepageextras->homepageextra_shortdescriptionimg)))
         <div class="col-lg-6 col-md-6 col-sm-12 image-contain animated fadeInRight wow ">
            <figure>
               <img class="d-block w-100" src="{{ asset('images/homepageextra/'.$homepageextras->homepageextra_shortdescriptionimg) }}" alt="{{ env('APP_NAME') }}">
            </figure>
         </div>
         @endif
      </div>
   </div>
</section>
@if($video->video_url != '')
<section class="video-section d-none custom-margin wow  animated zoomIn">
   <figure>
      <img src="{{ (($video->video_fallbackimage != '') && file_exists(public_path('images/video/'.$video->video_fallbackimage))) ? asset('images/video/'.$video->video_fallbackimage) : asset('frontend/images/videofallback.png') }}" alt="Video">
   </figure>
   @php($videoParts = parseVideos($video->video_url))
   <a class="vpop popup-video" data-type="youtube" data-id="{{ Str::remove('v=', $videoParts['query']) }}" data-autoplay='true'>
      <i class="fas fa-play-circle"></i>
      <div class="sonar-wave sonar-wave1"></div>
      <div class="sonar-wave sonar-wave2"></div>
      <div class="sonar-wave sonar-wave3"></div>
      <div class="sonar-wave sonar-wave4"></div>
   </a>
   <div id="video-popup-overlay"></div>
   <div id="video-popup-container">
      <div id="video-popup-close" class="fade">X</div>
      <div id="video-popup-iframe-container">
         <iframe id="video-popup-iframe" src="" width="100%" height="100%" frameborder="0"></iframe>
      </div>
   </div>
</section>
@endif
@if($testimonials->isNotEmpty())
<section class="testimonals  custom-margin wow fadeInDown animated">
   <div class="container">
      <div class="heading">
         <h2>Testimonials </h2>
      </div>
      <div class="testimonials-slider ">
         @foreach($testimonials as $testimonial)
         <div class="testimonials-card">
            <div class="card-heading">
               <figure>
                  <img class="d-block w-100" src="{{ (($testimonial->testimonial_image != '') && file_exists(public_path('images/testimonials/'.$testimonial->testimonial_image))) ? asset('images/testimonials/'.$testimonial->testimonial_image) : asset('images/default.png') }}" alt="{{ $testimonial->testimonial_author }}">
               </figure>
            </div>
            <div class="card-body">
               <div class="name">
                  <h5>
                     {{ $testimonial->testimonial_author }}
                  </h5>
               </div>
               <div class="position">
                  {{ $testimonial->testimonial_designation }}
               </div>
               <p>
                  “{{ $testimonial->testimonial_description }}”
               </p>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
@endif
@if($blogs->isNotEmpty())
<section class="blog-section  custom-margin wow fadeInDown animated">
   <div class="container">
      <div class="heading">
         <h2>Latest Blogs </h2>
      </div>
      <div class="row gy-4">
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
      </div>
   </div>
</section>
@endif
@endsection