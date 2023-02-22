@extends('backend.master')

@section('content')

<div class="content-wrapper" style="min-height: 1203.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Categories List </h3> --}}

                <button><a href="{{ url('add-category') }}"> <i class="fas fa-plus-circle"></i> Add More Category</a></button>
              

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">SL NO</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Created At</th>
                      <th>Updated At</th>

                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $cats as $key => $cat )
                    <tr>
                      <td>{{ $cats->firstItem() + $key }}</td>
                      <td>{{ $cat->category_name }}</td>
                      <td>{{ $cat->slug }}</td>
                      <td>{{ $cat->created_at->format('d - m - Y . h:i :s  a')}}  ({{ $cat->created_at->diffforHumans() }})</td>
                      <td>{{ $cat->updated_at->format('d - m - Y . h:i :s  a')}}  ({{ $cat->created_at->diffforHumans() }})</td>
                      <td class="text-center">
                          <a  class="btn btn-success" href="{{ url('category_edit')}}/ {{ $cat->id }}">  <i class="fas fa-edit"></i> </a>
                          <a  class="btn btn-danger" href="{{ url('delete-category')}}/ {{ $cat->id }}">  <i class="fas fa-trash-alt"></i>  </a>
                      </td>
                     
                    </tr>              
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              {{ $cats->links() }}
              {{-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div> --}}
            <!-- /.card -->


          </div>
          
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    
@endsection

@section('footer_js')
    <script> 
   @if (session('success'))
     

Command: toastr["success"]("{{ session('success') }}")

@endif
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
    </script>
@endsection