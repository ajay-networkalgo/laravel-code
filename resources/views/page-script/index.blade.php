@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Page Scripts List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Page Scripts</li>
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
              <h3 class="card-title">Page Scripts</h3>
              <a href="{{ route('page-script.add') }}" class="btn btn-primary" style="float:right;">Add Page Script</a>
            </div>
            <div class="card-body">
              <table id="page_script_list" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">Sr.no</th>
                    <th class="text-center">Page</th>
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
<script type="text/javascript">
$(document).ready(function(){
  var siteUrl = "{{ config('app.site_url') }}";
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var table = $('#page_script_list').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('page-script.index') }}",
    columnDefs: [
            { width: '20%', targets: 0 }, 
            { width: '60%', targets: 1 }, 
            { width: '20%', targets: 2 }  
        ],
    columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false},
      {data: 'page', name: 'page',orderable: false},
      {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
  });
  
 
  $('#page_script_list').DataTable().on('click', '.deleteRecord', function (e) { 
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
            url: `/admin/page-script/delete/${encryptId}`, 
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status == true) {
                  Swal.fire({
                    title: "Page Script deleted!",
                    icon: "success"
                  });
                  $('#page_script_list').DataTable().ajax.reload();
                }
            },
            error: function (response) {
                alert('Error deleting Page Script.');
            }
          });
        }
      });
    });

});
</script>
@endsection
