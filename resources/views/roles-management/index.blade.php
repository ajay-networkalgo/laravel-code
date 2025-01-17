@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Roles List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Roles management</li>
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
              <h3 class="card-title">Roles Management</h3>
              <a href="{{ route('roles.add') }}" class="btn btn-primary" style="float:right;">Add role</a>
            </div>
            <div class="card-body">
              <table id="roles_list" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">Sr.no</th>
                    <th class="text-center">Roles</th>
                    <th class="text-center">Created at</th>
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
    var table = $('#roles_list').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('roles.index') }}",
      columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false},
        {data: 'roles', name: 'roles',orderable: false},
        {data: 'created_at', name: 'created_at',orderable: false},
        {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });
  });
</script>
@endsection
