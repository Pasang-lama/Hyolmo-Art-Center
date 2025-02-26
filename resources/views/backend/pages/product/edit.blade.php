@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content pt-4">
      <div class="container-fluid">
         <form action="{{ route('admin.product.update', $product->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
               <div class="col-md-9">
                  <!-- SELECT2 EXAMPLE -->
                  <div class="card card-default">
                     <div class="card-header">
                        <h3 class="card-title">Edit Product</h3>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <div class="row">
                           {{--
                           <div class="col-md-12">
                              --}}
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text"
                                       class="form-control {{ $errors->has('product_name') ? 'is-invalid' : '' }}"
                                       name="product_name" id="product_name" placeholder="Enter Product Name"
                                       value="{{ $product->product_name }}" autocomplete="off" />
                                    @error('product_name')
                                    <span class="text-danger">
                                    {{ $errors->first('product_name') }}
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Product Code</label>
                                    <input type="text"
                                       class="form-control {{ $errors->has('product_code') ? 'is-invalid' : '' }}"
                                       name="product_code" id="product_code" placeholder="Enter Product Code"
                                       value="{{ $product->product_code }}" autocomplete="off" />
                                    @error('product_code')
                                    <span class="text-danger">
                                    {{ $errors->first('product_code') }}
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text"
                                       class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}"
                                       name="slug" id="slug" value="{{ $product->slug }}" autocomplete="off" />
                                    @error('slug')
                                    <span class="text-danger">
                                    {{ $errors->first('slug') }}
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Brand</label>
                                    <select
                                       class="form-control select2 {{ $errors->has('brand_id') ? 'is-invalid' : '' }}"
                                       name="brand_id" style="width: 100%;">
                                       <option value="" selected>--Select-Brand--</option>
                                       @foreach ($brand as $b)
                                       <option value="{{ $b->id }}"
                                       {{ $product->brand_id == $b->id ? 'selected' : '' }}>
                                       {{ $b->name }}</option>
                                       @endforeach
                                    </select>
                                    @error('brand_id')
                                    <span class="text-danger">
                                    {{ $errors->first('brand_id') }}
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Category</label>
                                    <select
                                       class="form-control select2 {{ $errors->has('category_id') ? 'is-invalid' : '' }}"
                                       name="category_id[]" style="width: 100%;" multiple="multiple">
                                       <option value="">Select Category</option>
                                       @foreach ($categories as $category)
                                       <option value="{{ $category->id }}" @if ($product->category->contains($category->id))
                                       selected
                                       @endif
                                       >
                                       {{ $category->category_name }}
                                       </option>
                                       @foreach ($category->childrenCategories as $childCategory)
                                       @include('backend/pages/product/recursive_edit_child_category',
                                       ['child_category' => $childCategory ,
                                       'product'=>$product
                                       ])
                                       @endforeach
                                       @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">
                                    {{ $errors->first('category_id') }}
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Product Weight(in KG)</label>
                                    <input type="number"
                                       class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}"
                                       name="weight" id="weight" value="{{ $product->weight }}" placeholder="Enter Weight of Product" autocomplete="off" />
                                    @error('weight')
                                    <span class="text-danger">
                                    {{ $errors->first('weight') }}
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Regular Price</label>
                                    <input type="number"
                                       class="form-control {{ $errors->has('regular_price') ? 'is-invalid' : '' }}"
                                       name="regular_price" id="regular_price" placeholder="Price"
                                       value="{{ $product->regular_price }}" autocomplete="off" />
                                    @error('regular_price')
                                    <span class="text-danger">
                                    {{ $errors->first('regular_price') }}
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Discount Percent(%)</label>
                                    <input type="number"
                                       class="form-control {{ $errors->has('discount_percent') ? 'is-invalid' : '' }}"
                                       min="0" max="100" name="discount_percent" id="discount_percent"
                                       value="{{ $product->discount_percent }}"
                                       placeholder="Enter Discount Percent" autocomplete="off" />
                                    @error('discount_precent')
                                    <span class="text-danger">
                                    {{ $errors->first('discount_percent') }}
                                    </span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="suitable_for">Suitable For</label>
                                    <select name="suitable_for" class="form-control {{ $errors->has('suitable_for') ? 'is-invalid' : '' }}" id="suitable_for">
                                       <option value="">Select</option>
                                       <option value="1" {{ ((old('suitable_for') == 1) || ($product->suitable_for == 1)) ? 'selected' : '' }}>Male</option>
                                       <option value="2" {{ ((old('suitable_for') == 2) || ($product->suitable_for == 2)) ? 'selected' : '' }}>Female</option>
                                       <option value="3" {{ ((old('suitable_for') == 3) || ($product->suitable_for == 3)) ? 'selected' : '' }}>Kid</option>
                                    </select>
                                    @error('suitable_for')
                                    <span class="text-danger">
                                    {{ $errors->first('suitable_for') }}
                                    </span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-12">
                                 <div
                                    class="form-group {{ $errors->has('description') ? 'is-invalid' : '' }}">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description"
                                       rows="5">{{ $product->description }}</textarea>
                                    @error('description')
                                    <span class="text-danger">
                                    {{ $errors->first('description') }}
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              {{--
                           </div>
                           --}}
                           <!-- /.col -->
                        </div>
                        <!-- /.row -->
                     </div>
                     <!-- /.card-body -->
                  </div>
                  <div class="card card-default">
                     <div class="card-header">
                        <h3 class="card-title font-weight-bold">Image</h3>
                        <span class="ml-2 muted">Note:This image is display as primary image in listings</span>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-4 append-col">
                              <div class="card">
                                <img  class="card-img-top" src="{{ (( $product->product_image != '') && file_exists(public_path('images/'. $product->product_image))) ? asset('images/'. $product->product_image) :  asset('images/default.png')  }}"
                                alt="Product Image"  id="pic" height="auto" width="200px">
                                 <div class="card-body">
                                    <p class="card-text">
                                       <label>Thumbnail Image</label>
                                       <input type="file" name="product_image"
                                          onchange="pic.src=window.URL.createObjectURL(this.files[0])"accept="image/*">
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <!-- /.col -->
                        </div>
                        <!-- /.row -->
                     </div>
                     <!-- /.card-body -->
                  </div>
                  <div class="card card-default d-none">
                     <div class="card-header">
                        <h3 class="card-title">Cross Selling Product</h3>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Cross Selling Product</label>
                                 <select class="form-control  select2" style="width: 100%;"
                                    name="cross_selling_product[]" multiple="multiple">
                                    <option disabled>Select Cross Selling Product</option>
                                    @foreach ($products as $p)
                                    <option value="{{ $p->id }}" @if ($product->cross_selling_product)
                                    {{ in_array($p->id, $product->cross_selling_product) ? 'selected' : '' }}
                                    @endif
                                    >{{ $p->product_name }}
                                    </option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <!-- /.col -->
                        </div>
                        <!-- /.row -->
                     </div>
                     <!-- /.card-body -->
                  </div>
                  <div class="card card-default">
                     <div class="card-header">
                        <h3 class="card-title">SEO Management</h3>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>SEO Title</label>
                                 <input type="text"
                                    class="form-control  {{ $errors->has('seo_title') ? 'is-invalid' : '' }}"
                                    name="seo_title" value="{{ $product->seo_title }}" id="seo_title"
                                    placeholder="Enter SEO Title">
                                 @error('seo_title')
                                 <span class="text-danger">
                                 {{ $errors->first('seo_title') }}
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <label>SEO Description</label>
                                 <textarea
                                    class="form-control {{ $errors->has('seo_description') ? 'is-invalid' : '' }}"
                                    name="seo_description"
                                    rows="5">{{ $product->seo_description }}</textarea>
                                 @error('seo_description')
                                 <span class="text-danger">
                                 {{ $errors->first('seo_description') }}
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <label>SEO Keyword</label>
                                 <textarea
                                    name="seo_keyword {{ $errors->has('seo_keyword') ? 'is-invalid' : '' }}"
                                    id="seo_keyword"
                                    class="form-control">{{ $product->seo_keyword }}</textarea>
                                 @error('seo_keyword')
                                 <span class="text-danger">
                                 {{ $errors->first('seo_keyword') }}
                                 </span>
                                 @enderror
                              </div>
                           </div>
                           <!-- /.col -->
                        </div>
                        <!-- /.row -->
                     </div>
                     <!-- /.card-body -->
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card card-default sticky-card">
                     <div class="card-header">
                        <h3 class="card-title">Action</h3>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <div class="form-group">
                           <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="statusSwitch"
                              name="status" value="1" {{ old('status') ? 'checked' : '' }}
                              @if ($product->status == 1) checked @endif>
                              <label class="custom-control-label" for="statusSwitch"> Active
                              Status</label>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="saleSwitch" name="sale"
                              value="1" {{ old('sale') ? 'checked' : '' }} @if ($product->sale == 1) checked @endif>
                              <label class="custom-control-label" for="saleSwitch">On Sale</label>
                           </div>
                        </div>
                     </div>
                     <!-- /.col -->
                     <div class="card-footer">
                        <input type="submit" class="btn btn-primary  btn-sm float-right" value="Submit">
                     </div>
                  </div>
                  <!--card-->
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
         </form>
      </div>
      <!-- /.container-fluid -->
   </section>
   </section>
</div>
@endsection
@section('script')
<script>
   $(document).ready(function() {
       $('#product_name').on('keyup change', function() {
           var text = $(this).val();
           text = text.toLowerCase().replace(/[^a-zA-Z0-9]+/g, '-');
           $('#slug').val(text);
       });

       $('#slug').on('keyup change', function() {
           var text = $(this).val();
           text = text.toLowerCase().replace(/[^a-zA-Z0-9]+/g, '-');
           $('#slug').val(text);
       });
   });
</script>
@endsection
