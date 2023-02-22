@extends('backend.master')

@section('content')

<div class="content-wrapper" style="min-height: 1203.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
                {{-- <h3 class="card-title">Products </h3> --}}

                <button><a href="{{ url('add-products') }}"> <i class="fas fa-plus-circle"></i> Add More Products</a></button>
              

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">SL NO</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Thumbnail</th>
                      <th>Created At</th>
                      <th>Updated At</th>

                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $products as $key => $product )
                    <tr>
                      <td>{{ $products->firstItem() + $key }}</td>
                      <td>{{ $product->title }}</td>
                      <td>{{ $product->slug }}</td>
                      <td>
                        <img width="100" src="{{ asset('thumbnail/' . $product->thumbnail )}}" alt="{{ $product->title }}">
                      </td>
                      <td>{{ $product->created_at->format('d - m - Y . h:i :s  a')}}  ({{ $product->created_at->diffforHumans() }})</td>
                      <td>{{ $product->updated_at->format('d - m - Y . h:i :s  a')}}  ({{ $product->created_at->diffforHumans() }})</td>
                      <td class="text-center">
                          <a  class="btn btn-success" href="{{ url('product-edit')}}/ {{ $product->slug }}">   <i class="fas fa-edit"></i>   </a>
                          <a  class="btn btn-danger" href="{{ url('delete-product')}}/ {{ $product->id }}"> <i class="fas fa-trash-alt"></i>  </a>
                      </td>
                     
                    </tr>              
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              {{ $products->links() }}
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