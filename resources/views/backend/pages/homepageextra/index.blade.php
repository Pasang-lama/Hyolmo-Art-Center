@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content pt-4">
      <div class="container-fluid">
         <form action="{{ route('admin.homepageextra.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="row">
               <div class="col-md-12">
                  <!-- SELECT2 EXAMPLE -->
                  <div class="card card-default">
                     <div class="card-header">
                        <h3 class="card-title">HomePage Extra</h3>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <div class="form-group">
                           <label for="homepageextrabannerimage">Banner Image</label>
                           <img class="col-md-3" src="{{ (($homepageextra->homepageextra_bannerimage != '') && file_exists(public_path('/images/homepageextra/'.$homepageextra->homepageextra_bannerimage))) ? asset('/images/homepageextra/'.$homepageextra->homepageextra_bannerimage) : asset('images/default.png') }}"
                              alt="Home Page Extra Banner Image" height="300px" width="500px" id="homepageextrabannerimage">
                           <input type="file" name="homepageextra_bannerimage"
                              onchange="homepageextrabannerimage.src=window.URL.createObjectURL(this.files[0])"
                              accept="image/*" class="form-control col-md-9">
                           @error('homepageextra_bannerimage')
                           <span class="text-danger">
                           {{ $errors->first('homepageextra_bannerimage') }}
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="homepageextra_bannerlink">Banner Link</label>
                           <input type="text"
                              class="form-control col-md-9 {{ $errors->has('homepageextra_bannerlink') ? 'is-invalid' : '' }}"
                              name="homepageextra_bannerlink" id="homepageextra_bannerlink" value="{{ old('homepageextra_bannerlink') ? old('homepageextra_bannerlink') : $homepageextra->homepageextra_bannerlink }}"
                              placeholder="Enter Banner Link"/>
                           @error('homepageextra_bannerlink')
                           <span class="text-danger">
                           {{ $errors->first('homepageextra_bannerlink') }}
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="homepageextra_shortdescription">Short Description</label>
                           <textarea class="form-control col-md-9 editor {{ $errors->has('homepageextra_shortdescription') ? 'is-invalid' : '' }}" placeholder="Short Description" id="homepageextra_shortdescription" name="homepageextra_shortdescription">{{ old('homepageextra_shortdescription') ? old('homepageextra_shortdescription') : $homepageextra->homepageextra_shortdescription }}</textarea>
                           @error('homepageextra_shortdescription')
                           <span class="text-danger">
                           {{ $errors->first('homepageextra_shortdescription') }}
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="homepageextrashortdescriptionimg">Short Description Image</label>
                           <img class="col-md-3" src="{{ (($homepageextra->homepageextra_shortdescriptionimg != '') && file_exists(public_path('/images/homepageextra/'.$homepageextra->homepageextra_shortdescriptionimg))) ? asset('/images/homepageextra/'.$homepageextra->homepageextra_shortdescriptionimg) : asset('images/default.png') }}"
                              alt="Home Page Extra Short Description Image" height="300px" width="500px" id="homepageextrashortdescriptionimg">
                           <input type="file" name="homepageextra_shortdescriptionimg"
                              onchange="homepageextrashortdescriptionimg.src=window.URL.createObjectURL(this.files[0])"
                              accept="image/*" class="form-control col-md-9">
                           @error('homepageextra_shortdescriptionimg')
                           <span class="text-danger">
                           {{ $errors->first('homepageextra_shortdescriptionimg') }}
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="homepageextra_shortdescriptionlink">Short Description Link</label>
                           <input type="text"
                              class="form-control col-md-9 {{ $errors->has('homepageextra_shortdescriptionlink') ? 'is-invalid' : '' }}"
                              name="homepageextra_shortdescriptionlink" id="homepageextra_shortdescriptionlink" value="{{ old('homepageextra_shortdescriptionlink') ? old('homepageextra_shortdescriptionlink') : $homepageextra->homepageextra_shortdescriptionlink }}"
                              placeholder="Enter Short Description Link"/>
                           @error('homepageextra_shortdescriptionlink')
                           <span class="text-danger">
                           {{ $errors->first('homepageextra_shortdescriptionlink') }}
                           </span>
                           @enderror
                        </div>
                        <!-- <div class="form-group">
                           <label for="homepageextramentileimg">Men Tile Image</label>
                           <img class="col-md-3" src="{{ (($homepageextra->homepageextra_mentileimg != '') && file_exists(public_path('/images/homepageextra/'.$homepageextra->homepageextra_mentileimg))) ? asset('/images/homepageextra/'.$homepageextra->homepageextra_mentileimg) : asset('images/default.png') }}"
                              alt="Home Page Extra Men Tile Image" height="189px" width="193px" id="homepageextramentileimg">
                           <input type="file" name="homepageextra_mentileimg"
                              onchange="homepageextramentileimg.src=window.URL.createObjectURL(this.files[0])"
                              accept="image/*" class="form-control col-md-9">
                           @error('homepageextra_mentileimg')
                           <span class="text-danger">
                           {{ $errors->first('homepageextra_mentileimg') }}
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="homepageextra_mentilelink">Men Tile Image Link</label>
                           <input type="text"
                              class="form-control col-md-9 {{ $errors->has('homepageextra_mentilelink') ? 'is-invalid' : '' }}"
                              name="homepageextra_mentilelink" id="homepageextra_mentilelink" value="{{ old('homepageextra_mentilelink') ? old('homepageextra_mentilelink') : $homepageextra->homepageextra_mentilelink }}"
                              placeholder="Enter Men Image Tile Link"/>
                           @error('homepageextra_mentilelink')
                           <span class="text-danger">
                           {{ $errors->first('homepageextra_mentilelink') }}
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="homepageextrawomentileimg">Women Tile Image</label>
                           <img class="col-md-3" src="{{ (($homepageextra->homepageextra_womentileimg != '') && file_exists(public_path('/images/homepageextra/'.$homepageextra->homepageextra_womentileimg))) ? asset('/images/homepageextra/'.$homepageextra->homepageextra_womentileimg) : asset('images/default.png') }}"
                              alt="Home Page Extra Women Tile Image" height="189px" width="193px" id="homepageextrawomentileimg">
                           <input type="file" name="homepageextra_womentileimg"
                              onchange="homepageextrawomentileimg.src=window.URL.createObjectURL(this.files[0])"
                              accept="image/*" class="form-control col-md-9">
                           @error('homepageextra_womentileimg')
                           <span class="text-danger">
                           {{ $errors->first('homepageextra_womentileimg') }}
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="homepageextra_womentilelink">Women Tile Image Link</label>
                           <input type="text"
                              class="form-control col-md-9 {{ $errors->has('homepageextra_womentilelink') ? 'is-invalid' : '' }}"
                              name="homepageextra_womentilelink" id="homepageextra_womentilelink" value="{{ old('homepageextra_womentilelink') ? old('homepageextra_womentilelink') : $homepageextra->homepageextra_womentilelink }}"
                              placeholder="Enter Women Image Tile Link"/>
                           @error('homepageextra_womentilelink')
                           <span class="text-danger">
                           {{ $errors->first('homepageextra_womentilelink') }}
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="homepageextrakidtileimg">Kid's Tile Image</label>
                           <img class="col-md-3" src="{{ (($homepageextra->homepageextra_kidtileimg != '') && file_exists(public_path('/images/homepageextra/'.$homepageextra->homepageextra_kidtileimg))) ? asset('/images/homepageextra/'.$homepageextra->homepageextra_kidtileimg) : asset('images/default.png') }}"
                              alt="Home Page Extra Women Tile Image" height="189px" width="193px" id="homepageextrakidtileimg">
                           <input type="file" name="homepageextra_kidtileimg"
                              onchange="homepageextrakidtileimg.src=window.URL.createObjectURL(this.files[0])"
                              accept="image/*" class="form-control col-md-9">
                           @error('homepageextra_kidtileimg')
                           <span class="text-danger">
                           {{ $errors->first('homepageextra_kidtileimg') }}
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="homepageextra_kidtilelink">Kid's Tile Image Link</label>
                           <input type="text"
                              class="form-control col-md-9 {{ $errors->has('homepageextra_kidtilelink') ? 'is-invalid' : '' }}"
                              name="homepageextra_kidtilelink" id="homepageextra_kidtilelink" value="{{ old('homepageextra_kidtilelink') ? old('homepageextra_kidtilelink') : $homepageextra->homepageextra_womentilelink }}"
                              placeholder="Enter Women Image Tile Link"/>
                           @error('homepageextra_kidtilelink')
                           <span class="text-danger">
                           {{ $errors->first('homepageextra_kidtilelink') }}
                           </span>
                           @enderror
                        </div> -->
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <input type="submit" class="btn btn-primary  btn-sm float-left" value="Submit">
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
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