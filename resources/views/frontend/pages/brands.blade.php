@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section ">
    <div class="container">
        <div class="wrapper">
            <div class="title">Our Art Category</div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Our Art Category</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="product-categories-section custom-margin">
   <div class="container">
      <div class="page-title">
         <h4>
            Brands
         </h4>
      </div>
      <div class="row gy-4">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="product-preview-section">
               <div class="row gy-4">
                  @if($brands->isNotEmpty())
                  @foreach($brands as $brand)
                  <div class="col-lg-4 col-md col-sm-6">
                     <div class="product-card">
                        <div class="card-heading">
                           <a  href="{{ route('frontend.brand_details',[$brand->slug]) }}">
                              <figure>
                                 <img class="d-block w-100" src="{{ ($brand->logo != '') && file_exists(public_path('images/'.$brand->logo)) ? asset('images/'.$brand->logo) : asset('images/default.png') }}" alt="{{ $brand->name }}">
                              </figure>
                           </a>
                           <div class="hover-content">
                              <ul>
                                 <li class="View-details">
                                    <a data-bs-toggle="tooltip"
                                       data-bs-placement="left" title="View details" href="{{ route('frontend.brand_details',[$brand->slug]) }}"><i
                                       class="fas fa-search"></i></a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="card-body">
                           <h6 class="text-center">{{ $brand->name }}</h6>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  @else
                  <div class="col-lg-12 col-md-12 col-sm-12">
                     <p>No Brands Found</p>
                  </div>
                  @endif
               </div>
            </div>
            {{ $brands->links() }}
         </div>
      </div>
   </div>
</section>
@endsection