@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section ">
   <div class="container">
      <div class="wrapper">
         <div class="title">Products</div>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
               <li class="breadcrumb-item active">Products</li>
            </ol>
         </nav>
      </div>
   </div>
</section>
<section class="product-categories-section custom-margin">
   <div class="container">
      <div class="page-title">
         <h4>
            Products
         </h4>
      </div>
      <div class="row gy-4">
         <div class="col-lg-3 col-md-4 col-sm-12">
            @include('frontend.pages.partials.sidesearch')
         </div>
         <div class="col-lg-9 col-md-8 col-sm-12">
            <div class="product-preview-section">
               <div class="row gy-4">
                  @if($products->isNotEmpty())
                  @foreach($products as $product)
                  <!-- <div class="col-lg-4 col-md col-sm-6">
                     <div class="product-card"  data-pcount="{{ $loop->iteration }}" data-section="numberNewArrivals">
                        <div class="card-heading">
                            <a href="{{ route('main_product', [$product->slug]) }}">
                                <figure>
                                    <img class="d-block w-100"
                                        src="{{ $product->product_image != '' && file_exists(public_path('images/' . $product->product_image)) ? asset('images/' . $product->product_image) : asset('images/default.png') }}"
                                        alt="{{ $product->product_name }}">
                                </figure>
                            </a>
                           <div class="hover-content">
                              <ul>
                                 <li class="Wishlist add-to-wishlist"><a data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Add to Wishlist" href=""><i class="far fa-heart"></i></a>
                                 </li>
                                 <li class="View-details"><a data-bs-toggle="tooltip"
                                    data-bs-placement="left" title="View details" href="{{ route('main_product', [$product->slug]) }}"><i
                                    class="fas fa-search"></i></a></li>
                              </ul>
                           </div>
                           @if(($product->discount_percent != '') || ($product->discount_percent > 0))
                           <div class="sale">
                              <span>-{{ $product->discount_percent }}%</span>
                           </div>
                           @endif
                        </div>
                        <div class="card-body">
                           <h6 class="text-center">{{ $product->product_name }}</h6>
                        
                           <div class="price text-center py-1">
                              @if($product->special_price > 0)
                              <span class="text-decoration-line-through text-muted pe-1">
                              {{ env('DEFAULT_CURRENCY_SYMBOL','Rs.') }}{{ (formatcurrency($product->regular_price,'NPR')) }}
                              </span>
                              <span>
                              {{ env('DEFAULT_CURRENCY_SYMBOL','Rs.') }}{{ (formatcurrency($product->special_price,'NPR')) }}
                              </span>
                              @else
                              <span>
                              {{ env('DEFAULT_CURRENCY_SYMBOL','Rs.') }}{{ (formatcurrency($product->regular_price,'NPR')) }}
                              </span>
                              @endif
                           </div>
                           <div class="add-to-cart-button">
                            <form>

                                <div id="numberNewArrivalsDiv{{ $loop->iteration}}" class="product-sizes-listing d-none value-button">
                                {{ getProductAttr($product->id, 'size') }}
                                </div>

                                <div class="value-button" id="decrease" onclick="decreaseValue('numberNewArrivals',{{$loop->iteration}})" value="Decrease Value">-
                                </div>

                                <input type="number" id="numberNewArrivals{{$loop->iteration}}" value="1" class="product_qty" data-id="{{ $product->id }}" data-sp="{{ $product->regular_price }}" data-title="{{ $product->product_name }}"
                                data-size="{{ getProductAttr($product->id, 'size') }}" data-stock="{{ getProductAttr($product->id, 'stock') }}/>

                                <div class="value-button" id="increase" onclick="increaseValue('numberNewArrivals',{{$loop->iteration}})" value="Increase Value">+
                                </div>
                                <button class="Add-to-card value-button addToCartAjax" data-pcount="{{ $loop->iteration }}" data-section="numberNewArrivals">Add to Cart</button>
                             </form>
                           </div>
                        </div>
                     </div>
                  </div> -->
                  <div class="col-lg-4 col-md col-sm-6">
                     <div class="product-card" data-pcount="{{ $loop->iteration }}" data-section="numberNewArrivals">
                        <a href="{{ route('main_product', [$product->slug]) }}">
                           <figure>
                              <img class="d-block w-100" src="{{ $product->product_image != '' && file_exists(public_path('images/' . $product->product_image)) ? asset('images/' . $product->product_image) : asset('images/default.png') }}" alt="{{ $product->product_name }}">
                           </figure>
                        </a>
                        @if ($product->discount_percent == '' || $product->discount_percent > 0)
                        <div class="sale">
                           <span>-{{ $product->discount_percent }}%</span>
                        </div>
                        @endif
                        <div class="details">
                           <h2 class="text-center"> <a href="{{ route('main_product', [$product->slug]) }}">{{ $product->product_name }} </a></h2>
                           <div class="price text-center py-1">
                              @if ($product->special_price > 0)
                              <span class="text-decoration-line-through text-muted pe-1">
                                 {{ env('DEFAULT_CURRENCY_SYMBOL', 'Rs.') }}{{ formatcurrency($product->regular_price, 'NPR') }}
                              </span>
                              <span>
                                 {{ env('DEFAULT_CURRENCY_SYMBOL', 'Rs.') }}{{ formatcurrency($product->special_price, 'NPR') }}
                                 @php($product_price = $product->special_price)
                              </span>
                              @else
                              <span>
                                 {{ env('DEFAULT_CURRENCY_SYMBOL', 'Rs.') }}{{ formatcurrency($product->regular_price, 'NPR') }}
                                 @php($product_price = $product->regular_price)
                              </span>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  @else
                  <div class="col-lg-12 col-md-12 col-sm-12">
                     <p>No Products Found</p>
                  </div>
                  @endif
               </div>
            </div>
            {{ $products->links() }}
         </div>
      </div>
   </div>
</section>
@endsection
@section('script')
<script>
   $(document).ready(function() {

      // $('input[type=checkbox]').on('click', function() {
      //     var value = $(this).val();
      //     $('#filter-form').submit();
      // });

      // $('#colors').change(function() {
      //     var value = $(this).val();
      //     $('#filter-form').submit();
      // });

      //Add to WishList
      // $(".toggle-wishlist").click(function(e) {
      //     e.preventDefault();
      //     var item = $(this);
      //     var productId = item.data('id');
      //     //   console.log(productId);
      //     $.ajax({
      //         headers: {
      //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //         },
      //         url: "{{ route('wishlist.store') }}",
      //         method: 'post',
      //         data: {
      //             product_id: productId,
      //         },
      //         success: function(result) {
      //             // console.log(result);
      //             if (result == 'added') {
      //                 var wish_count = $('#wish-count').text();
      //                 var wish_count_num = parseInt(wish_count);
      //                 $('#wish-count').text(wish_count_num + 1);
      //                 toastr.success('Item Added To Wishlist!', 'Success', {
      //                     closeButton: true,
      //                     positionClass: "toast-bottom-right"
      //                 });
      //                 item.children().attr("src",
      //                     "{{ asset('frontend/images/wishlisted.png') }}");
      //             } else if (result == 'removed') {
      //                 var wish_count = $('#wish-count').text();
      //                 var wish_count_num = parseInt(wish_count);
      //                 $('#wish-count').text(wish_count_num - 1);
      //                 toastr.info('Item Removed From Wishlist', 'Success', {
      //                     closeButton: true,
      //                     positionClass: "toast-bottom-right"
      //                 });
      //                 item.children().attr("src",
      //                     "{{ asset('frontend/images/wish.png') }}");
      //             } else if (result == 'bad') {
      //                 toastr.warning('Bad Request', 'Sorry', {
      //                     closeButton: true,
      //                     positionClass: "toast-bottom-right"
      //                 });
      //             } else {
      //                 toastr.error('Server Error Occoured', 'Error', {
      //                     closeButton: true,
      //                     positionClass: "toast-bottom-right"
      //                 });
      //             }

      //         },
      //         error: function(result) {
      //             toastr.error('Server Error Occoured', 'Error', {
      //                 closeButton: true,
      //                 positionClass: "toast-bottom-right"
      //             });
      //         }
      //     });
      // });

      //Add to Cart
      // $(".addToCartAjax").click(function(e) {
      //     e.preventDefault();
      //     var id = $(this).data("id");
      //     var sp = $(this).data("sp");
      //     var title = $(this).data("title");
      //     var color = $(this).data("color");
      //     console.log("id is" + id + "sp is " + sp + "title is " + color + ".");

      //     $.ajax({
      //         headers: {
      //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //         },
      //         url: "{{ route('cart.store') }}",
      //         method: 'post',
      //         data: {
      //             id: id,
      //             title: title,
      //             sale_price: sp,
      //         },
      //         success: function(result) {
      //             console.log(result);
      //             if (result == 'added') {
      //                 var cart_count = $('#cart-count').text();
      //                 var cart_count_num = parseInt(cart_count);
      //                 $('#cart-count').text(cart_count_num + 1);
      //                 toastr.success('Item Added To Cart!', 'Success', {
      //                     closeButton: true,
      //                     positionClass: "toast-bottom-right"
      //                 });
      //             } else if (result == 'exist') {
      //                 toastr.info('Item Exist In Cart', 'Success', {
      //                     closeButton: true,
      //                     positionClass: "toast-bottom-right"
      //                 });
      //             } else if (result == 'outOfStock') {
      //                 toastr.info('Item Out Of Stock', 'Success', {
      //                     closeButton: true,
      //                     positionClass: "toast-bottom-right"
      //                 });
      //             } else {
      //                 toastr.error('Server Error Occoured', 'Error', {
      //                     closeButton: true,
      //                     positionClass: "toast-bottom-right"
      //                 });
      //             }

      //         },
      //         error: function(result) {
      //             toastr.error('Server Error Occoured', 'Error', {
      //                 closeButton: true,
      //                 positionClass: "toast-bottom-right"
      //             });
      //         }
      //     });
      // });
   });
</script>
@endsection