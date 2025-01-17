@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Company Info</h1>
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
              <h3 class="card-title">Company Info</h3>
            </div>
            <form action="{{ route('company.download.update',$companyDownloads->id) }}" method="post" id="AeditCompanyForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                <div class="col-md-6">
                    <label>Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ old('name', $companyDownloads->name) }}">
                    @error('name')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Files<span style="color: red;">*</span></label>
                    <input type="file" name="company_files" id="company_files" class="form-control">
                    <input type="hidden" name="exist_image" id="exist_image" value="{{$companyDownloads->file_name}}">
                    <input type="hidden" name="format" id="format" value="{{$companyDownloads->format}}">
                    <input type="hidden" name="size" id="size" value="{{$companyDownloads->size}}">
                    <?php if($companyDownloads->format == 'pdf'){?>
                    <a href="{{ asset('uploads/file/'.$companyDownloads->file_name) }}" target="_blank" style="font-size: 50px;margin-left: 10px;"><i class="fas fa-file-alt"></i></a>
                    <?php }else{?>
                      <div class="col-md-3">
                        <div class="card">
                          <img src="{{ asset('uploads/file/'.$companyDownloads->file_name) }}" alt="News Image" class="card-img-top img-fluid">
                        </div>
                      </div>
                    <?php }?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Language<span style="color: red;">*</span></label>
                    <!-- <input type="text" class="form-control" name="language" id="language" placeholder="Enter language"> -->
                    <select class="form-control" name="language" id="language" >
                      <option value="">--Select--</option>
                      <option value="Global" {{ old('language', $companyDownloads->language) == 'Global' ? 'selected' : '' }}>Global</option>
                      <option value="English" {{ old('language', $companyDownloads->language) == 'English' ? 'selected' : '' }}>English</option>
                      <option value="Deutsch" {{ old('language', $companyDownloads->language) == 'Deutsch' ? 'selected' : '' }}>Deutsch</option>
                      <option value="Francais" {{ old('language', $companyDownloads->language) == 'Francais' ? 'selected' : '' }}>Francais</option>
                      <option value="Nederlands" {{ old('language', $companyDownloads->language) == 'Nederlands' ? 'selected' : '' }}>Nederlands</option>
                      <option value="Polski" {{ old('language', $companyDownloads->language) == 'Polski' ? 'selected' : '' }}>Polski</option>
                      <option value="Italiano" {{ old('language', $companyDownloads->language) == 'Italiano' ? 'selected' : '' }}>Italiano</option>
                      <option value="Japanese" {{ old('language', $companyDownloads->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                      <option value="Türkçe" {{ old('language', $companyDownloads->language) == 'Türkçe' ? 'selected' : '' }}>Türkçe</option>
                      <option value="Português" {{ old('language', $companyDownloads->language) == 'Português' ? 'selected' : '' }}>Português</option>
                      <option value="Chinese" {{ old('language', $companyDownloads->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                      <option value="Spanish" {{ old('language', $companyDownloads->language) == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                      <option value="Ukraine" {{ old('language', $companyDownloads->language) == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                    </select>
                    @error('language')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Date:</label>
                    <div class="input-group date custom_date_message" id="reservationdate" data-target-input="nearest">
                      <input type="text" id="date" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('last_updated', $companyDownloads->last_updated) }}"/>
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

    $.validator.addMethod('dimention', function(value, element, param) {
      if(element.files.length == 0){
          return true;
      }
      var width = $(element).data('imageWidth');
      var height = $(element).data('imageHeight');
      if(width == param[0] && height == param[1]){
        return true;
      }else{
        return false;
      }
    },'Please upload an image with 400 x 300 pixels dimension');

    $(document).on('change','#company_files',function(){
      var input = document.getElementById('featured_images');
      var block = $("#fileUpload").css('display','block');
      var output = document.getElementById('fileUpload');
      var children = "";
      children += '<p>Your selected files here</p>';
      for (var i = 0; i < input.files.length; ++i) {
          children += '<li>' + input.files.item(i).name + '</li>';
      }
      output.innerHTML = '<ul>'+children+'</ul>';
    });

  });
</script>
@endsection
