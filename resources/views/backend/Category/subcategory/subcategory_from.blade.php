@extends('backend.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Sub Category Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Sub Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ url('post-subcategory') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control"  @error('subcategory_name') is-invalid @enderror value="{{ old('subcategory_name') }}" name="subcategory_name" id="subcategory_name" placeholder=" Enter Category Name">
                    @error('category_name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                     
                  </div>
                 
                  <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" @error('slug') is-invalid @enderror value="{{ old('slug') }}" name="slug" id="slug" placeholder= "Enter Slug">
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  </div> 

                  <div class="form-group">
                    <label for="slug">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                      <Option value="">Select One</Option>
                      @foreach ($categories as $category)
                      <Option value="{{ $category->id }}">{{ $category->category_name }}</Option>
                      @endforeach
                    </select>
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  </div> 
                   
                
                </div> 
                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           
            </div>
            <!-- /.card -->



          </div>
          <!--/.col (left) -->
          <!-- right column -->
        
          <!--/.col (right) -->
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

$('#subcategory_name').keyup(function() {
    $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
});
    </script>

@endsection