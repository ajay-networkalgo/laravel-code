@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pages List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pages</li>
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
              <h3 class="card-title">Pages</h3>
              <a href="{{ route('page.add') }}" class="btn btn-primary" style="float:right;">Add Page</a>
            </div>
            <div class="card-body">
              <table id="pages_list" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">Sr.no</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Slug</th>
                    <th class="text-center">Short Description</th>
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
<script type="text/javascript">
$(document).ready(function(){
  var siteUrl = "{{ config('app.site_url') }}";
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var table = $('#pages_list').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('page.index') }}",
    columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false},
      {data: 'title', name: 'title',orderable: false},
      {data: 'slug', name: 'slug',orderable: false},
      {data: 'short_description', name: 'short_description',orderable: false},
      {data: 'status', name: 'status',orderable: false, searchable: false,render:function(data){
        var status_id = data.split("_");
        var status = status_id[0];
        var id = status_id[1];
        if(status == 1){
          var button = '<button type="button" class="btn btn-xs btn-success changeStatusone" id="'+id+'" data-status="1">Active</button>';
        }else{
          var button = '<button type="button" class="btn btn-xs btn-danger changeStatusone" id="'+id+'" data-status="0">Deactive</button>';
        }
        return button;
      }},
      {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
  });
  
  
 
  $('#pages_list').DataTable().on('click', '.deleteRecord', function (e) { 
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
            url: `/admin/page/delete/${encryptId}`, 
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status == true) {
                  Swal.fire({
                    title: "Page deleted!",
                    icon: "success"
                  });
                  $('#pages_list').DataTable().ajax.reload();
                }
            },
            error: function (response) {
                alert('Error deleting Page.');
            }
          });
        }
      });
    });
$('#pages_list').on('click', '.changeStatusone', function (e) {
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
                url: `/admin/page/changestatus`, 
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
                        $('#pages_list').DataTable().ajax.reload();
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
