@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products Categories List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Product Categories</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class') }} alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            <i class="fa fa-times"></i>
          </button>
          <p style="margin-bottom:0rem !important;"><i class="{{ Session::get('icon-class') }}"></i> {{ Session::get('message') }}</p>
        </div>
      @endif
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Products Categories</h3>
              <a href="{{ route('product-categories.add') }}" class="btn btn-primary" style="float:right;">Add Product Category</a>
            </div>
            <div class="card-body">
              <table id="product_categories_list" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">Sr.no</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Featured Image</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Dropzone Modal -->
<div class="modal fade" id="dropzoneModal" tabindex="-1" role="dialog" aria-labelledby="dropzoneModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="dropzoneModalLabel" class="modal-title">Manage Images</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- Dropzone Form -->
                <!-- <form action="{{ route('products.image') }}" class="dropzone" id="dropzone" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="item_id" id="item_id">
                </form> -->

                 <form action="#" class="dropzone" id="file-dropzone">
                    @csrf
                    <input type="hidden" name="item_id" id="item_id">
                </form>

                <!-- Image Gallery -->
                <div id="imageGallery" class="row mt-4">
                    <!-- Images will be loaded here dynamically -->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  var siteUrl = "{{ config('app.site_url') }}";
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var table = $('#product_categories_list').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('product-categories.index') }}",
    columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false},
      {data: 'name', name: 'name',orderable: false},
      {data: 'description', name: 'description',orderable: false},
      {data: 'feature_image', name: 'feature_image',orderable: false},
      {data: 'status', name: 'status',orderable: false, searchable: false,render:function(data){
        var status_id = data.split("_");
        var status = status_id[0];
        var id = status_id[1];
        if(status == 1){
          var button = '<button type="button" class="btn btn-xs btn-success changeStatus" id="'+id+'" data-status="1">Active</button>';
        }else{
          var button = '<button type="button" class="btn btn-xs btn-danger changeStatus" id="'+id+'" data-status="0">Deactive</button>';
        }
        return button;
      }},
      {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
  });
  
 
  $('#product_categories_list').DataTable().on('click', '.deleteRecord', function (e) { 
      var encryptId = $(this).attr('id');
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "DELETE",
            url: `/admin/product-categories/delete/${encryptId}`, 
            
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status == true) {
                  Swal.fire({
                    title: "Product Category deleted!",
                    icon: "success"
                  });
                  $('#product_categories_list').DataTable().ajax.reload();
                }
            },
            error: function (response) {
                alert('Error deleting Product Type item.');
            }
          });
        }
      });
    });
   
$('#product_categories_list').on('click', '.changeStatus', function (e) {
    e.preventDefault();  
    var id = $(this).attr('id');
    var status = $(this).data('status'); 
    Swal.fire({
        title: 'Are you sure?',
        text: "Are you sure you want to change status?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok'
    })
    .then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/admin/product-categories/changestatus`, 
                type: "POST",  
                data: {
                    rowid: id,
                    status: status
                },
                dataType: 'json',
                success: function (data) {
                    if (data.status === true) {
                        Swal.fire({
                            title: "Good job!",
                            text: "Status has been changed.",
                            icon: "success"
                        });
                        $('#product_categories_list').DataTable().ajax.reload();
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "Failed to change status.",
                            icon: "error"
                        });
                    }
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        title: "Oops!",
                        text: "There was an error processing your request: " + error,
                        icon: "error"
                    });
                }
            });
        }
    });
});

});
</script>
@endsection
