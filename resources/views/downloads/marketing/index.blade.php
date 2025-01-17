@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Marketing Download List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Marketing Download</li>
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
              <h3 class="card-title">Marketing Material</h3>
              <a href="{{ route('marketing.download.add') }}" class="btn btn-primary" style="float:right;">Add Marketing Material</a>
            </div>
            <div class="card-body">
              <table id="marketing_list" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">Sr.no</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">File</th>
                    <th class="text-center">Language</th>
                    <th class="text-center">Size</th>
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
    var table = $('#marketing_list').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('marketing.download.index') }}",
      columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false},
        {data: 'name', name: 'name',orderable: false},
        {data: 'file_name', name: 'file_name',orderable: false},
        {data: 'language', name: 'language',orderable: false},
        {data: 'size', name: 'size',orderable: false},
        {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });
    $('#marketing_list').DataTable().on('click', '.deleteRecord', function (e) {
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
            url: siteUrl+"admin/marketing-download/delete/"+newsId,
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status == true) {
                  Swal.fire({
                    title: "Marketing deleted!",
                    icon: "success"
                  });
                  $('#marketing_list').DataTable().ajax.reload();
                }
            },
            error: function (response) {
                alert('Error deleting news item.');
            }
          });
        }
      });
    });
  });
</script>
@endsection
