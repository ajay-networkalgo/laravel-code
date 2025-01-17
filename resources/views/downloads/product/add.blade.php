@extends('layout.admin')
@section('page-content')
<style type="text/css">
  #loader {
    display: none;
    text-align: center;
    margin-bottom: 10px;
}

.spinner-border {
    width: 3rem;
    height: 3rem;
}
</style>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Product Info</h1>
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
            <form action="{{ route('products.download.save') }}" method="post" id="addProductInfoForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Product Type<span style="color: red;">*</span></label>
                    <select class="form-control" name="product_type" id="product_type">
                      <option value="">--Select--</option>
                      @foreach($product_types as $types)
                        <option value="{{ $types->id }}" <?php echo old('product_type') == $types->id ? 'selected' : ''?> >{{ $types->name }}</option>
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
                      <option value="1" <?php echo old('file_type') == "1" ? 'selected' : ''?>>Datasheet</option>
                      <option value="2" <?php echo old('file_type') == "2" ? 'selected' : ''?>>User Manual</option>
                      <option value="3" <?php echo old('file_type') == "3" ? 'selected' : ''?>>Quick Installation</option>
                      <option value="4" <?php echo old('file_type') == "4" ? 'selected' : ''?>>Certification</option>
                      <option value="5" <?php echo old('file_type') == "5" ? 'selected' : ''?>>Picture</option>
                      <option value="6" <?php echo old('file_type') == "6" ? 'selected' : ''?>>Marketing Material</option>
                    </select>
                    @error('file_type')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-4 certification_row" style="display: none;">
                    <label>Certification<span style="color: red;">*</span></label>
                    <select class="form-control" name="certification_type" id="certification_type">
                      <option value="">--Select--</option>
                    </select>
                    @error('certification_type')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-2 certification_row" style="display: none;margin-top:32px;">
                    <button style="width:100%" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addOptionModal">Add New</button>
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-md-6">
                    <label>Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="file_name" id="file_name" placeholder="Enter Name" value="{{ old('file_name') }}">
                    @error('file_name')
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
                      <input type="text" id="date" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('date') }}" />
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
<div class="modal fade" id="addOptionModal" tabindex="-1" role="dialog" aria-labelledby="addOptionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="addOptionForm">
        <div class="modal-header">
          <h5 class="modal-title" id="addOptionModalLabel">Add New Certificate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="optionName">Name:</label>
              <input type="text" id="optionName" name="optionName" class="form-control">
              <span id="err_msg_name" style="color:red"></span>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>

          </div>
          <div id="loader" style="display: none; text-align: center; margin-bottom: 10px;">
            <div class="spinner-border text-primary" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
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
    $('#addOptionModal').on('shown.bs.modal', function () {
        $('#optionName').focus();
    });
    var siteUrl = "{{ config('app.site_url') }}";
    $(document).on("change","#product_type",function(){
      var value = $(this).val();
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
                $('#products').append('<option value="' + value.id + '">' + value.name + '</option>');
            });
        },
        error: function(response) {
          alert(response);
        }
      });
    });

    function loadCertificates() {
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
            $('.certification_row').show();
            $('#certification_type').empty();
            $('#certification_type').append('<option value="">Select a certification</option>');
              $.each(data, function (key, value) {
                  $('#certification_type').append('<option value="' + value.id + '">' + value.name + '</option>');
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
        loadCertificates();
      }else{
        $('#file_row').removeClass('col-md-6').addClass('col-md-12');
        $('.certification_row').hide();
      }
    });

    var value = $('#file_type').val();
    if(value == 4){
        loadCertificates();
    }

    $('#addOptionForm').on('submit', function(e) {
      e.preventDefault();
      var optionName = $('#optionName').val();
      if(optionName.trim() == ""){
        $("#err_msg_name").html("Please enter a name");
        return false;
      }else{
        $('#loader').show();
        $.ajax({
          url: siteUrl+"admin/product-download/addCertification",
          method: 'POST',
          data: {
            _token: '{{ csrf_token() }}',
            optionName: optionName
          },
          success: function(response) {
            console.log(response);
            if (response.success) {
              $('#certification_type').append('<option value="' + response.certifications.id + '">' + response.certifications.name + '</option>');
              $('#addOptionModal').modal('hide');
              $('#addOptionForm')[0].reset();
              $('#loader').hide();
            } else {
              alert('Error: Could not add option');
            }
          }
        });
      }

    });

  });
</script>
@endsection
