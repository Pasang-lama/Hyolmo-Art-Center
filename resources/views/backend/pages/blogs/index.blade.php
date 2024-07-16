@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
   <section class="content pt-4">
      <div class="row">
         <div class="col-12">
            <!-- /.card -->
            <div class="card">
               <div class="card-header ">
                  <h3 class="card-title ">
                     <strong> Blogs List</strong>
                  </h3>
                  <h3 class="card-title float-right">
                     <a href="{{route('admin.blogs.create')}}" class="btn btn-primary btn-xs" title="Create New blog">
                     Create
                     </a>
                  </h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th scope="col">S.N</th>
                           <th scope="col">Blog Title</th>
                           <th scope="col">Created at</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td> <strong></strong>{{ $blog->blog_title }}</td>
                           <td>{{ date_format(($blog->created_at),('D, d M Y')) }}</td>
                           <td>
                              @if ( $blog->blog_status == 1 )
                              <span class="badge badge-success">Active</span>
                              @else
                              <span class="badge badge-danger">Inactive</span>
                              @endif
                           </td>
                           <td>
                              <form class="form-inline" method="post"
                                 action="{{ route('admin.blogs.destroy', $blog->id) }}">
                                 @csrf
                                 @method('delete')
                                 <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                    class="btn btn-secondary btn-xs mx-1"><i class="fa fa-edit"> </i></a>
                                 <button onclick="return confirm('Are you sure you want to delete this blog?')"
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