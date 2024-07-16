@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content pt-4">
      <div class="container-fluid">
         <form action="{{ route('admin.video.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="row">
               <div class="col-md-12">
                  <div class="card card-default">
                     <div class="card-header">
                        <h3 class="card-title">Video</h3>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <div class="form-group">
                           <label for="video_url">Video Url</label>
                           <input type="text" name="video_url" class="form-control" value="{{ old('video_url') ? old('video_url') : $video->video_url }}" />
                           @if($errors->has('video_url'))
                           <span class="text-danger">
                           {{ $errors->first('video_url') }}
                           </span>
                           @endif
                        </div>
                        <div class="form-group">
                           <label for="video_fallbackimage">Video Fallback Image</label>
                           <img src="{{ ($video->video_fallbackimage != '' && file_exists(public_path('images/video/'.$video->video_fallbackimage))) ? asset('images/video/'.$video->video_fallbackimage) : asset('images/default.png') }}" alt="Video Fallback Image"
                              class="rounded" id="video_fallbackimage" width="200px">
                           <input type="file" name="video_fallbackimage"
                              onchange="document.getElementById('video_fallbackimage').src = window.URL.createObjectURL(this.files[0])"
                              accept="image/*" class="form-control">
                           @if($errors->has('video_fallbackimage'))
                           <span class="text-danger">
                           {{ $errors->first('video_fallbackimage') }}
                           </span>
                           @endif
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <input type="submit" class="btn btn-primary  btn-sm float-left" value="Submit">
                     </div>
                  </div>
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