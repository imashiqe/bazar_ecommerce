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
                <h3 class="card-title">Trashed Data</h3>

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
                    @forelse ( $categories as $key => $cat )
                    <tr>
                      <td>{{ $categories ->firstItem() + $key }}</td>
                      <td>{{ $cat->category_name }}</td>
                      <td>{{ $cat->slug }}</td>
                      <td>{{ $cat->created_at->format('d - m - Y . h:i :s  a')}}  ({{ $cat->created_at->diffforHumans() }})</td>
                      <td>{{ $cat->updated_at->format('d - m - Y . h:i :s  a')}}  ({{ $cat->created_at->diffforHumans() }})</td>
                      <td class="text-center">
                          <a  class="btn btn-success" href="{{ url('restore-category')}}/ {{ $cat->id }}"> <i class="fas fa-trash-restore-alt"></i> </a>
                          <a  class="btn btn-danger DeleteCat" data-id="{{ $cat->id }}" data-toggle="modal" data-target="#modal-default"> <i class="fas fa-ban"></i></a>
                          {{-- <a  class="btn btn-danger" href="{{ url('permanent-category') }}/ {{ $cat->id }}" > Permanent Delete</a> --}}
                      </td>
                     
                    </tr>    
                    @empty
                    <td colspan="10"  class="text-center">No Data Available</td>     
                   @endforelse
                  </tbody>
                </table>
              </div>
              <div class="modal fade " id="modal-default" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Are You Sure? Enter Password</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <form action="{{ url('permanent-category') }}" method="POST">
                      @csrf
                     <div class="modal-body">
                       <input type="password" name="password" class="form-control" placeholder="Enter Your Password ">
                       </div>
                       <input type="hidden" name="cat_id" class="cat_id">
                       <div class="modal-footer justify-content-between">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                       <button type="submit" class="btn btn-primary">Save changes</button>
                     </div>
                  </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.card-body -->
              {{ $categories->links() }}
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
$('.DeleteCat').click(function(){
  var cat_id = $(this).attr("data-id");
 $('.cat_id').val(cat_id)
})
    </script>
@endsection