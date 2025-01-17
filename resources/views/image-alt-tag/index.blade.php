@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Image Alt Tag List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Image Alt Tags</li>
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
              <h3 class="card-title">Image Alt Tags</h3>
              <a href="{{ route('image-alt-tag.add') }}" class="btn btn-primary" style="float:right;">Add Image Alt Tag</a>
            </div>
            <div class="card-body">
              <table id="image-alt-tag-list" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">Sr.no</th>
                    <th class="text-center">Url</th>
                    <th class="text-center">Path</th>
                    <th class="text-center">Text</th>
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

<script type="text/javascript">
$(document).ready(function(){
  var siteUrl = "{{ config('app.site_url') }}";
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var table = $('#image-alt-tag-list').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('image-alt-tag.index') }}",
    columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false},
      {data: 'url', name: 'url',orderable: false},
      {data: 'path', name: 'path',orderable: false},
      {data: 'text', name: 'text',orderable: false},
      {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
  });
  
 
  $('#image-alt-tag-list').DataTable().on('click', '.deleteRecord', function (e) { 
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
            url: `/admin/image-alt-tag/delete/${encryptId}`, 
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status == true) {
                  Swal.fire({
                    title: "Image Alt Tag deleted!",
                    icon: "success"
                  });
                  $('#image-alt-tag-list').DataTable().ajax.reload();
                }
            },
            error: function (response) {
                alert('Error deleting Image Alt Tag.');
            }
          });
        }
      });
    });
});
</script>
@endsection
