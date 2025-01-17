@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Company Info</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Marketing</h3>
            </div>
            <form action="{{ route('company.download.save') }}" method="post" id="AaddCompanyForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                <div class="col-md-6">
                    <label>Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ old('name') }}">
                    @error('name')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Files<span style="color: red;">*</span></label>
                    <input type="file" name="company_files" id="company_files" class="form-control">
                    @error('company_files')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Language<span style="color: red;">*</span></label>
                    <!-- <input type="text" class="form-control" name="language" id="language" placeholder="Enter language"> -->
                    <select class="form-control" name="language" id="language" >
                      <option value="">--Select--</option>
                      <option value="Global" <?php echo old('language') == "Global" ? 'selected' : ''?>>Global</option>
                      <option value="English" <?php echo old('language') == "English" ? 'selected' : ''?>>English</option>
                      <option value="Deutsch" <?php echo old('language') == "Deutsch" ? 'selected' : ''?>>Deutsch</option>
                      <option value="Francais" <?php echo old('language') == "Francais" ? 'selected' : ''?>>Francais</option>
                      <option value="Nederlands" <?php echo old('language') == "Nederlands" ? 'selected' : ''?>>Nederlands</option>
                      <option value="Polski" <?php echo old('language') == "Polski" ? 'selected' : ''?>>Polski</option>
                      <option value="Italiano" <?php echo old('language') == "Italiano" ? 'selected' : ''?>>Italiano</option>
                      <option value="Japanese" <?php echo old('language') == "Japanese" ? 'selected' : ''?>>Japanese</option>
                      <option value="Türkçe" <?php echo old('language') == "Türkçe" ? 'selected' : ''?>>Türkçe</option>
                      <option value="Português" <?php echo old('language') == "Português" ? 'selected' : ''?>>Português</option>
                      <option value="Chinese" <?php echo old('language') == "Chinese" ? 'selected' : ''?>>Chinese</option>
                      <option value="Spanish" <?php echo old('language') == "Spanish" ? 'selected' : ''?>>Spanish</option>
                      <option value="Ukraine" <?php echo old('language') == "Ukraine" ? 'selected' : ''?>>Ukraine</option>
                    </select>
                    @error('language')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Date:</label>
                    <div class="input-group date custom_date_message" id="reservationdate" data-target-input="nearest">
                      <input type="text" id="date" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('date') }}"/>
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                    @error('date')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="card-footer" style="float: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{!! url('admin/company-download')!!}" class="btn btn-warning">Back</a>
              </div>
            </form>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  $(function () {
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  });
</script>
@endsection
