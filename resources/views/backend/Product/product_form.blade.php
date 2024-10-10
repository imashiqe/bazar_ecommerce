@extends('backend.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ url('post-products') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Product Name</label>
                    <input type="text" class="form-control"  @error('title') is-invalid @enderror value="{{ old('title') }}" name="title" id="title" placeholder=" Enter Product Name">
                    @error('title')
             <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                     
                  </div>
{{--                  
                  <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" @error('slug') is-invalid @enderror value="{{ old('slug') }}" name="slug" id="slug" placeholder= "Enter Slug">
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  </div>  --}}

                  <div class="form-group">
                    <label for="name">Category Name</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">select One</option>
                        @foreach ($cats as  $cat)
                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                        @endforeach
                    </select>
                    @error('category_name')
             <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                     
                  </div>

                  <div class="form-group">
                    <label for="name">SubCategory  Name</label>
                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                        
                    </select>
                    @error('scategory_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                     
                  </div>


                  <div class="form-group">
                    <label for="name">Thumbnail</label>
                    <input type="file" class="form-control"  @error('thumbnail') is-invalid @enderror  name="thumbnail" id="thumbnail" >
                    @error('thumbnail')
             <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  </div>

                  <div class="form-group">
                    <label for="name">Summary</label>
                    <textarea name="summary" id="summary"  class="form-control"  @error('summary') is-invalid @enderror ></textarea>
                    @error('category_name')
             <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  </div>

                  <div class="form-group">
                    <label for="name">Description</label>
                    <textarea name="description" id="description"  class="form-control"  @error('description') is-invalid @enderror ></textarea>
                    @error('description')
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

$('#category_id').change(function(){
  
  var category_id = $(this).val();
  
  if(category_id){
    $.ajax({
        type:"GET",
        url:"{{url('api/get-subcat-list')}}/"+category_id,
        success:function(res){    
          // console.log(res)           
        if(res){
          $("#subcategory_id").empty();
          $('#subcategory_id').append('<option>Select One</option>');
          $.each(res, function(Key, value){
            $('#subcategory_id').append('<option value="'+value.id+'"> '+value.subcategory_name+'</option>');
          });
        //     $("#state").empty();
        //     $("#state").append('<option>Select</option>');
        //     $.each(res,function(key,value){
        //         $("#state").append('<option value="'+value.id+'">'+value.state_name+'</option>');
        //     });

        }else{
        //     $("#state").empty();
        $("#sub category_id").empty();
        }

        }

    });
  }

});


$('.DeleteCat').click(function(){
  var cat_id = $(this).attr("data-id");
 $('.cat_id').val(cat_id)
})

$('#category_name').keyup(function() {
    $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
});



    </script>
<!-- tinymce
<script src='https://cdn.tiny.cloud/1/2k7ja1p6iahhqwamx8nu4wfcqyuy8x7uchckhprd56d7j0x5/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>
<script>
  tinymce.init({
    selector: '#description'
  });
</script> -->

@endsection