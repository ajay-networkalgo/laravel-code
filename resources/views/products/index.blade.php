@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products List</h1>
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
              <h3 class="card-title">Products</h3>
              <a href="{{ route('products.add') }}" class="btn btn-primary" style="float:right;">Add products</a>
            </div>
            <div class="card-body">
              <table id="product_list" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">Sr.no</th>
                    <th class="text-center">Title</th>
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

                 <form action="{{ route('products.image') }}" class="dropzone" id="file-dropzone">
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
  var table = $('#product_list').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('products.index') }}",
    columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false},
      {data: 'title', name: 'title',orderable: false},
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
  $('#product_list').DataTable().on('click', '.deleteRecord', function (e) {
    var newsId = $(this).attr('id');
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
          url: siteUrl+"admin/products/delete/"+newsId,
          data: {
              _token: '{{ csrf_token() }}'
          },
          success: function (response) {
              if (response.status == true) {
                Swal.fire({
                  title: "Product deleted!",
                  icon: "success"
                });
                $('#product_list').DataTable().ajax.reload();
              }
          },
          error: function (response) {
              alert('Error deleting news item.');
          }
        });
      }
    });
  });
  $('#product_list').DataTable().on('click', '.openDropzone', function (e) {
    var id = $(this).attr('id');
    $('#item_id').val(id);
    $('#dropzoneModal').modal('show');
    loadImageGallery(id);
  });
  $('#product_list').DataTable().on('click', '.changeStatus', function (e) {
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
          url: siteUrl+"admin/products/changestatus",
          type: "post",
          data: {
            rowid: id,status: status
          },
          dataType: 'json',
          success: function(data) {
            if (data.status == true) {
              Swal.fire({
                title: "Good job!",
                text: "Status has been changed.!",
                icon: "success"
              });
              $('#product_list').DataTable().ajax.reload();
            }
          }
        });
      } else {
        //swal("Your imaginary file is safe!");
      }
    });
  });
});
var siteUrl = "{{ config('app.site_url') }}";
function loadImageGallery(itemId) {
  $.ajax({
    url: siteUrl+"admin/products/fetch/" + itemId,
    method: 'POST',
    data: {
      _token: '{{ csrf_token() }}'
    },
    success: function(data) {
      console.log('data');
        $('#imageGallery').html('');
        var image_path = '/img/product_images/related_products/';
        if (data.images.length > 0) {
            data.images.forEach(function(image) {

                $('#imageGallery').append(`
                    <div class="col-md-3 col-sm-4 col-6 mb-4">
                        <div class="image-container position-relative">
                            <img src="${image_path+"/"+image.images}" class="img-fluid rounded shadow-sm" alt="Image">
                            <button class="btn btn-danger btn-sm delete-image-btn" onclick="deleteImage(${image.id})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div id="loader" style="display: none; text-align: center; margin-bottom: 10px;">
                      <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                    </div>
                `);
            });
        } else {
            $('#imageGallery').html('<p class="text-muted">No images uploaded yet.</p>');
        }
    },
    error: function() {
        toastr.error('Failed to load images.');
    }
  });
}
function deleteImage(imageId) {
  if (confirm('Are you sure you want to delete this image?')) {
    $.ajax({
      url: siteUrl+"admin/products/image_delete/" + imageId,
      method: 'DELETE',
      data: {
          _token: '{{ csrf_token() }}'
      },
      success: function(response) {
          if (response.success) {
              loadImageGallery($('#item_id').val());
          }
      },
      error: function() {
          toastr.error('An error occurred while deleting the image.');
      }
    });
  }
}
</script>
<script>
  Dropzone.options.fileDropzone = {
    paramName: "file",
    maxFilesize: 5, // MB
    addRemoveLinks: false,
    success: function(file, response) {
      this.removeFile(file);
      loadImageGallery($("#item_id").val());
      file.upload.filename = response.success;
    }
  };
    </script>
@endsection
