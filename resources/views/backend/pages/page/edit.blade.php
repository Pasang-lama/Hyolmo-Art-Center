@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content pt-4">
      <div class="container-fluid">
         <form action="{{ route('admin.pages.update', [$page->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
               <div class="col-md-12">
                  <div class="card card-default">
                     <div class="card-header">
                        <h3 class="card-title">Edit Blog</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="page_title">Title</label>
                                 <input type="text"
                                    class="form-control {{ $errors->has('page_title') ? 'is-invalid' : '' }}"
                                    name="page_title" id="page_title" value="{{ old('page_title') ? old('page_title') : $page->page_title }}"
                                    placeholder="Enter Page Title" autocomplete="off" />
                                 @error('page_title')
                                 <span class="text-danger">
                                 {{ $errors->first('page_title') }}
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <label for="page_description">Description</label>
                                 <textarea
                                    class="form-control editor {{ $errors->has('page_description') ? 'is-invalid' : '' }}"
                                    name="page_description" rows="5" id="page_description">{{ old('page_description') ? old('page_description') : $page->page_description }}</textarea>
                                 @error('page_description')
                                 <span class="text-danger">
                                 {{ $errors->first('page_description') }}
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <label for="page_image">Page Image</label>
                                 <img class="col-md-3" src="{{ (($page->page_image != '') && file_exists(public_path('images/pages/'.$page->page_image))) ? asset('images/pages/'.$page->page_image) : asset('images/default.png') }}"
                                    alt="Blog Image" height="199px" width="318px" id="pic">
                                 <input type="file" name="page_image"
                                    onchange="pic.src=window.URL.createObjectURL(this.files[0])"
                                    accept="image/*" class="form-control">
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