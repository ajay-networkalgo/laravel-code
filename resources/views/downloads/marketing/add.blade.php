@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Marketing Info</h1>
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
              <h3 class="card-title">Company Info Details</h3>
            </div>
            <form action="{{ route('marketing.download.save') }}" method="post" id="addMarketingForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Product Type<span style="color: red;">*</span></label>
                    <select class="form-control" name="type" id="type">
                      <option value="">--Select--</option>
                      @foreach($product_types as $types)
                        <option value="{{ $types->id }}"  <?php echo old('type') == $types->id ? 'selected' : ''?>>{{ $types->name }}</option>
                      @endforeach
                    </select>
                    @error('type')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Product Items:</label>
                    <select class="form-control" name="product_type" id="product_type">
                      <option value="">--Select--</option>
                      <option value="1" <?php echo old('product_type') == '1' ? 'selected' : ''?>>A1 HYBRID G2</option>
                      <option value="2" <?php echo old('product_type') == '2' ? 'selected' : ''?>>A1 AC</option>
                      <option value="3" <?php echo old('product_type') == '3' ? 'selected' : ''?>>SWITCH BOX</option>
                      <option value="4" <?php echo old('product_type') == '4' ? 'selected' : ''?>>A1-BI</option>
                      <option value="5" <?php echo old('product_type') == '5' ? 'selected' : ''?>>T-BAT-SYS-HV-5.0</option>
                      <option value="6" <?php echo old('product_type') == '6' ? 'selected' : ''?>>Pocket Dongle</option>
                      <option value="7" <?php echo old('product_type') == '7' ? 'selected' : ''?>>Energy Meter</option>
                      <option value="8" <?php echo old('product_type') == '8' ? 'selected' : ''?>>A1 ESS G2</option>
                    </select>
                    @error('product_type')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                    <label>Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{old('name')}}">
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
                <a href="{!! url('admin/marketing-download')!!}" class="btn btn-warning">Back</a>
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
