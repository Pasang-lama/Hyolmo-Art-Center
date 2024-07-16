@extends('backend.layouts.master')


@section('content')

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content pt-4">
            <div class="container-fluid">
                <form action="{{ route('admin.brand.update', $editbrand->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-12">
                            <!-- SELECT2 EXAMPLE -->
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">EDIT BRAND</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Brand Name:</label>
                                                <input type="text"
                                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                    name="name" id="brand_name" value={{ $editbrand->name }}
                                                    placeholder="Enter Brand Name" required>

                                                @error('name')
                                                    <span class="text-danger">
                                                        {{ $errors->first('name') }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Slug:</label>
                                                <input type="text"
                                                    class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}"
                                                    name="slug" id="slug" value={{ $editbrand->slug }}>
                                                @error('slug')
                                                    <span class="text-danger">
                                                        {{ $errors->first('slug') }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Order:</label>
                                                <input type="number"
                                                    class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}"
                                                    name="order" id="order" value={{ $editbrand->order }}>
                                                @error('order')
                                                    <span class="text-danger">
                                                        {{ $errors->first('order') }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Description:</label>
                                                <textarea
                                                    class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                                    name="description" rows="5">{{ $editbrand->description }}</textarea>
                                                @error('description')
                                                    <span class="text-danger">
                                                        {{ $errors->first('description') }}
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


                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">BRAND LOGO</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 append-col">
                                            <div class="card">
                                                        <img  class="card-img-top" src="{{ (( $editbrand->logo != '') && file_exists(public_path('images/'. $editbrand->logo))) ? asset('images/'. $editbrand->logo) :  asset('images/default.png')  }}"
                                                alt="Product Image"  id="pic" height="auto" width="200px">
                                                <div class="card-body">
                                                    <p class="card-text">
                                                        <label>Brand Logo</label>
                                                        <input type="file" name="logo"
                                                            onchange="pic.src=window.URL.createObjectURL(this.files[0])"
                                                            accept="image/*">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary btn-sm float-right" value="Update">
                                </div>
                            </div>
                        </div>


                        <!-- /.col -->

                    </div>
                    <!-- /.row -->









                </form>

            </div><!-- /.container-fluid -->
        </section>


        </section>
    </div>

@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $('#brand_name').on('keyup change', function() {
                var text = $(this).val();
                text = text.toLowerCase().replace(/[^a-zA-Z0-9]+/g, '-');
                $('#slug').val(text);
            });
        });
    </script>
@endsection
