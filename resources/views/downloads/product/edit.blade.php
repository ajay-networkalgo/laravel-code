@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Product Info</h1>
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
              <h3 class="card-title">Product Info Details</h3>
            </div>
            <form action="{{ route('products.download.update',$productDownloads->id) }}" method="post" id="BeditProductInfoForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Product Type<span style="color: red;">*</span></label>
                    <select class="form-control" name="product_type" id="product_type">
                      <option value="">--Select--</option>
                      @foreach($product_types as $types)
                        <option value="{{ $types->id }}" <?php echo ($productDownloads->product_type_id == $types->id) ? 'selected' : ''; ?>>{{ $types->name }}</option>
                      @endforeach
                    </select>
                    @error('product_type')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Product Items:</label>
                    <select class="form-control" name="products" id="products">
                      <option value="">--Select--</option>
                    </select>
                    @error('products')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12" id="file_row">
                    <label>File Type<span style="color: red;">*</span></label>
                    <select class="form-control" name="file_type" id="file_type">
                      <option value="">--Select--</option>
                      <option value="1" {{ old('file_type', $productDownloads->file_type) == '1' ? 'selected' : '' }}>Datasheet</option>
                      <option value="2" {{ old('file_type', $productDownloads->file_type) == '2' ? 'selected' : '' }}>User Manual</option>
                      <option value="3" {{ old('file_type', $productDownloads->file_type) == '3' ? 'selected' : '' }}>Quick Installation</option>
                      <option value="4" {{ old('file_type', $productDownloads->file_type) == '4' ? 'selected' : '' }}>Certification</option>
                      <option value="5" {{ old('file_type', $productDownloads->file_type) == '5' ? 'selected' : '' }}>Picture</option>
                      <option value="6" {{ old('file_type', $productDownloads->file_type) == '6' ? 'selected' : '' }}>Marketing Material</option>
                    </select>
                    @error('file_type')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6" id="certification_row" style="display: none;">
                    <label>Certification<span style="color: red;">*</span></label>
                    <select class="form-control" name="certification_type" id="certification_type">
                      <option value="">--Select--</option>
                    </select>
                    @error('certification_type')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-md-6">
                    <label>Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="file_name" id="file_name" placeholder="Enter Name" value="{{ old('file_name', $productDownloads->file_name) }}">
                    @error('file_name')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Files<span style="color: red;">*</span></label>
                    <input type="file" name="company_files" id="company_files" class="form-control">
                    <input type="hidden" name="exist_image" id="exist_image" value="{{$productDownloads->file}}">
                    <input type="hidden" name="format" id="format" value="{{$productDownloads->format}}">
                    <input type="hidden" name="size" id="size" value="{{$productDownloads->size}}">
                    <?php if($productDownloads->format == 'pdf'){?>
                    <a href="{{ asset('uploads/file/'.$productDownloads->file) }}" target="_blank" style="font-size: 50px;margin-left: 10px;"><i class="fas fa-file-alt"></i></a>
                    <?php }else{?>
                      <div class="col-md-3">
                        <div class="card">
                          <img src="{{ asset('uploads/file/'.$productDownloads->file) }}" alt="News Image" class="card-img-top img-fluid">
                        </div>
                      </div>
                    <?php }?>
                  </div>
                  <div class="row" id="fileUpload" style="display: none;font-size: 18px;margin-top: 15px;">
                    <p>Your selected files here</p>
                  </div>
                  @error('company_files')
                      <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Language<span style="color: red;">*</span></label>
                    <select class="form-control" name="language" id="language" >
                      <option value="">--Select--</option>
                      <option value="Global" {{ old('language', $productDownloads->language) == 'Global' ? 'selected' : '' }}>Global</option>
                      <option value="English" {{ old('language', $productDownloads->language) == 'English' ? 'selected' : '' }}>English</option>
                      <option value="Deutsch" {{ old('language', $productDownloads->language) == 'Deutsch' ? 'selected' : '' }}>Deutsch</option>
                      <option value="Francais" {{ old('language', $productDownloads->language) == 'Francais' ? 'selected' : '' }}>Francais</option>
                      <option value="Nederlands" {{ old('language', $productDownloads->language) == 'Nederlands' ? 'selected' : '' }}>Nederlands</option>
                      <option value="Polski" {{ old('language', $productDownloads->language) == 'Polski' ? 'selected' : '' }}>Polski</option>
                      <option value="Italiano" {{ old('language', $productDownloads->language) == 'Italiano' ? 'selected' : '' }}>Italiano</option>
                      <option value="Japanese" {{ old('language', $productDownloads->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                      <option value="Türkçe" {{ old('language', $productDownloads->language) == 'Türkçe' ? 'selected' : '' }}>Türkçe</option>
                      <option value="Português" {{ old('language', $productDownloads->language) == 'Português' ? 'selected' : '' }}>Português</option>
                      <option value="Chinese" {{ old('language', $productDownloads->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                      <option value="Spanish" {{ old('language', $productDownloads->language) == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                      <option value="Ukraine" {{ old('language', $productDownloads->language) == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                    </select>
                    @error('language')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Date:</label>
                    <div class="input-group date custom_date_message" id="reservationdate" data-target-input="nearest">
                      <input type="text" id="date" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('date', $productDownloads->date) }}"/>
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
                <a href="{!! url('admin/product-download')!!}" class="btn btn-warning">Back</a>
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

    // $(document).on('change','#company_files',function(){
    //   var input = document.getElementById('company_files');
    //   var block = $("#fileUpload").css('display','block');
    //   var output = document.getElementById('fileUpload');
    //   var children = "";
    //   children += '<p>Your selected files here</p>';
    //   for (var i = 0; i < input.files.length; ++i) {
    //       children += '<li>' + input.files.item(i).name + '</li>';
    //   }
    //   output.innerHTML = '<ul>'+children+'</ul>';
    // });
    var siteUrl = "{{ config('app.site_url') }}";
    var products = '<?php echo $productDownloads->product_id; ?>';
    var product_type_id = '<?php echo $productDownloads->product_type_id; ?>';
    var file_type = '<?php echo $productDownloads->file_type; ?>';
    var certification_id = '<?php echo $productDownloads->certification_id; ?>';
    if(file_type == 4){
      $('#file_row').removeClass('col-md-12').addClass('col-md-6');
      $('#certification_row').show();
      getCertificationDownload(file_type,certification_id);
    }
    getProductDownload(product_type_id,products);
    function getProductDownload(value,products){
      var posturl = siteUrl+"admin/product-download/products";
      $.ajax({
        url: posturl,
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            type_id: value
        },
        success: function(data) {
          $('#products').empty();
          $('#products').append('<option value="">Select a products</option>');
            $.each(data, function (key, value) {
              if(value.id == products){
                $('#products').append('<option value="' + value.id + '" selected>' + value.name + '</option>');
              }else{
                $('#products').append('<option value="' + value.id + '">' + value.name + '</option>');
              }
            });
        },
        error: function(response) {
          alert(response);
        }
      });
    }
    $(document).on("change","#product_type",function(){
      var value = $(this).val();
      var products = '';
      getProductDownload(value,products)
    });
    function getCertificationDownload(value,certification_id){
      var posturl = siteUrl+"admin/product-download/certification";
      $.ajax({
        url: posturl,
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            type_id: value
        },
        success: function(data) {
          $('#file_row').removeClass('col-md-12').addClass('col-md-6');
          $('#certification_row').show();
          $('#certification_type').empty();
          $('#certification_type').append('<option value="">Select a certification</option>');
            $.each(data, function (key, value) {
              if(value.id == certification_id){
                $('#certification_type').append('<option value="' + value.id + '" selected>' + value.name + '</option>');
              }else{
                $('#certification_type').append('<option value="' + value.id + '">' + value.name + '</option>');
              }
            });
        },
        error: function(response) {
          alert(response);
        }
      });
    }
    $(document).on("change","#file_type",function(){
      var value = $(this).val();
      if(value == 4){
        var certification_id = '';
        getCertificationDownload(value,certification_id);
      }else{
        $('#file_row').removeClass('col-md-6').addClass('col-md-12');
        $('#certification_row').hide();
      }
    });

  });
</script>
@endsection
