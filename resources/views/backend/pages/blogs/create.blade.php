@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content pt-4">
      <div class="container-fluid">
         <form action="{{ route('admin.blogs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-md-12">
                  <div class="card card-default">
                     <div class="card-header">
                        <h3 class="card-title">Create Blog</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="blog_title">Title</label>
                                 <input type="text"
                                    class="form-control {{ $errors->has('blog_title') ? 'is-invalid' : '' }}"
                                    name="blog_title" id="blog_title" value="{{ old('blog_title') }}"
                                    placeholder="Enter Blog Title" autocomplete="off" />
                                 @error('blog_title')
                                 <span class="text-danger">
                                 {{ $errors->first('blog_title') }}
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <label for="blog_description">Description</label>
                                 <textarea
                                    class="form-control editor {{ $errors->has('blog_description') ? 'is-invalid' : '' }}"
                                    name="blog_description" rows="5" id="blog_description">{{ old('blog_description') }}</textarea>
                                 @error('blog_description')
                                 <span class="text-danger">
                                 {{ $errors->first('blog_description') }}
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <label for="blog_image">Blog Image</label>
                                 <img class="col-md-3" src="{{ asset('images/default.png') }}"
                                    alt="Blog Image" height="300px" width="300px" id="pic">
                                 <input type="file" name="blog_image"
                                    onchange="pic.src=window.URL.createObjectURL(this.files[0])"
                                    accept="image/*" class="form-control">
                              </div>
                              <div class="form-group">
                                 <label for="blog_meta_title">Meta Title</label>
                                 <input type="text"
                                    class="form-control"
                                    name="blog_meta_title" id="blog_meta_title" value="{{ old('blog_meta_title') }}"
                                    placeholder="Enter Meta Title" autocomplete="off" />
                              </div>
                              <div class="form-group">
                                 <label for="blog_meta_description">Meta Description</label>
                                 <textarea
                                    class="form-control"
                                    name="blog_meta_description" rows="5" id="blog_meta_description" placeholder="Enter Meta Description" autocomplete="off">{{ old('blog_meta_description') }}</textarea>
                              </div>
                              <div class="form-group">
                                 <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="statusSwitch"
                                    name="blog_status" value="1" {{ old('status') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="statusSwitch"> Active
                                    Status</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card-footer">
                        <input type="submit" class="btn btn-primary btn-sm  float-left" value="Submit">
                     </div>
                     <!-- /.card-body -->
                  </div>
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
         </form>
      </div>
      <!-- /.container-fluid -->
   </section>
</div>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script type="text/javascript">
   $(function(){
      $('.editor').each(function(e){
         CKEDITOR.replace(this.id);
      });
   });
</script>
@endsection