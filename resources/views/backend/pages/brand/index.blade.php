@extends('backend.layouts.master')


@section('content')

<div class="content-wrapper">
 
  
  <section class="content pt-4">
    <div class="row">
      <div class="col-12">
        
        <!-- /.card -->

        <div class="card">
          <div class="card-header ">

            <h2 class="card-title ">
              <strong>Brand List</strong>
            </h2>
            <h3 class="card-title float-right">
              <a href="{{route('admin.brand.create')}}"  class="btn btn-primary btn-xs" title="Create New Brand">
                 Create
              </a>
              </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-hover">
              <thead>
              <tr>
                <th scope="col">S.N</th>
                    <th scope="col">Name</th>
                    <th scope="col">order</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
              </tr>
              </thead>
              <tbody>
                 @foreach($brand as $b)
                   <tr>
                     <td>{{$loop->index+1}}</td>
                    <td>{{$b->name}}</td>
                    <td>{{$b->order}}</td>
                    <td>{{date_format($b->created_at,'D M Y')}}</td>
                    <td>
                      
                        <form class="form-inline" method="post"
                            action="{{ route('admin.brand.destroy', $b->id) }}">
                            @csrf
                            @method('delete')
                            <a href="{{ route('admin.brand.edit', $b->id) }}"
                                class="btn btn-secondary btn-xs mx-1"><i class="fa fa-edit"> </i></a>
                            <button onclick="return confirm('Are you sure you want to delete this brand?')"
                                type="submit" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                 
                    </td>
                   </tr>

                 @endforeach


              </tbody>
       
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
</div>

@endsection