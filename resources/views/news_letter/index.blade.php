@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>News Letter List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">News Letter</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">News Letter</h3>
            </div>
            <div class="card-body">
              <table id="news_letter_list" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">Sr.no</th>
                    <th class="text-center">Email</th>
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
    var table = $('#news_letter_list').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('news.letter.index') }}",
      columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false},
        {data: 'email', name: 'email',orderable: false},
      ]
    });
  });
</script>
@endsection
