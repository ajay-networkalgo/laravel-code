@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Marketing Info</h1>
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
            <form action="{{ route('marketing.download.update',$marketsDownloads->id) }}" method="post" id="editMarketingForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Product Type<span style="color: red;">*</span></label>
                    <select class="form-control" name="type" id="type">
                      <option value="">--Select--</option>
                      @foreach($product_types as $types)
                        <option value="{{ $types->id }}" <?php echo ($marketsDownloads->type == $types->id) ? 'selected' : ''; ?>>{{ $types->name }}</option>
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
                      <option value="1" {{ old('product_type', $marketsDownloads->product_type) == '1' ? 'selected' : '' }}>A1 HYBRID G2</option>
                      <option value="2" {{ old('product_type', $marketsDownloads->product_type) == '2' ? 'selected' : '' }}>A1 AC</option>
                      <option value="3" {{ old('product_type', $marketsDownloads->product_type) == '3' ? 'selected' : '' }}>SWITCH BOX</option>
                      <option value="4" {{ old('product_type', $marketsDownloads->product_type) == '4' ? 'selected' : '' }}>A1-BI</option>
                      <option value="5" {{ old('product_type', $marketsDownloads->product_type) == '5' ? 'selected' : '' }}>T-BAT-SYS-HV-5.0</option>
                      <option value="6" {{ old('product_type', $marketsDownloads->product_type) == '6' ? 'selected' : '' }}>Pocket Dongle</option>
                      <option value="7" {{ old('product_type', $marketsDownloads->product_type) == '7' ? 'selected' : '' }}>Energy Meter</option>
                      <option value="8" {{ old('product_type', $marketsDownloads->product_type) == '8' ? 'selected' : '' }}>A1 ESS G2</option>
                    </select>
                    @error('product_type')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                    <label>Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{$marketsDownloads->name}} {{ old('name', $marketsDownloads->name) }}">
                    @error('name')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Files<span style="color: red;">*</span></label>
                    <input type="file" name="company_files" id="company_files" class="form-control">
                    <input type="hidden" name="exist_image" id="exist_image" value="{{$marketsDownloads->file_name}}">
                    <input type="hidden" name="format" id="format" value="{{$marketsDownloads->format}}">
                    <input type="hidden" name="size" id="size" value="{{$marketsDownloads->size}}">
                    <?php if($marketsDownloads->format == 'pdf'){?>
                    <a href="{{ asset('uploads/file/'.$marketsDownloads->file_name) }}" target="_blank" style="font-size: 50px;margin-left: 10px;"><i class="fas fa-file-alt"></i></a>
                    <?php }else{?>
                        <br/>
                      <div class="col-md-3">
                        <div class="card">
                          <img src="{{ asset('uploads/file/'.$marketsDownloads->file_name) }}" alt="News Image" class="card-img-top img-fluid">
                        </div>
                      </div>
                    <?php }?>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label>Current Images</label>
                  <div class="row">

                  </div>
                </div> -->
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Language<span style="color: red;">*</span></label>
                    <!-- <input type="text" class="form-control" name="language" id="language" placeholder="Enter language"> -->
                    <select class="form-control" name="language" id="language" >
                      <option value="">--Select--</option>
                      <option value="Global" {{ old('language', $marketsDownloads->language) == 'Global' ? 'selected' : '' }}>Global</option>
                      <option value="English" {{ old('language', $marketsDownloads->language) == 'English' ? 'selected' : '' }}>English</option>
                      <option value="Deutsch" {{ old('language', $marketsDownloads->language) == 'Deutsch' ? 'selected' : '' }}>Deutsch</option>
                      <option value="Francais" {{ old('language', $marketsDownloads->language) == 'Francais' ? 'selected' : '' }}>Francais</option>
                      <option value="Nederlands" {{ old('language', $marketsDownloads->language) == 'Nederlands' ? 'selected' : '' }}>Nederlands</option>
                      <option value="Polski" {{ old('language', $marketsDownloads->language) == 'Polski' ? 'selected' : '' }}>Polski</option>
                      <option value="Italiano" {{ old('language', $marketsDownloads->language) == 'Italiano' ? 'selected' : '' }}>Italiano</option>
                      <option value="Japanese" {{ old('language', $marketsDownloads->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                      <option value="Türkçe" {{ old('language', $marketsDownloads->language) == 'Türkçe' ? 'selected' : '' }}>Türkçe</option>
                      <option value="Português" {{ old('language', $marketsDownloads->language) == 'Português' ? 'selected' : '' }}>Português</option>
                      <option value="Chinese" {{ old('language', $marketsDownloads->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                      <option value="Spanish" {{ old('language', $marketsDownloads->language) == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                      <option value="Ukraine" {{ old('language', $marketsDownloads->language) == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                    </select>
                    @error('language')
                      <div class="error">{{ $message }}</div>
                    @enderror
                   </div>
                  <div class="col-md-6">
                    <label>Date:</label>
                    <div class="input-group date custom_date_message" id="reservationdate" data-target-input="nearest">
                      <input type="text" id="date" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('date', $marketsDownloads->last_updated) }}"/>
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
    $("#editMarketingForm").validate({
      ignore: "",
      errorElement : 'label',
      rules: {
        'type':{
          required:true,
        },
        'product_type':{
          required:true,
        },
        'name':{
          required:true,
        },
        'date':{
          required:true,
          noSpace: true,
        },
        'language':{
          required:true,
          noSpace: true,
        },
        'company_files':{
          validate_file_type:true,
        },
      },
      messages:{
        'type':{
          required:'Please select type',
        },
        'product_type':{
          required:'Please select product_type',
        },
        'name':{
          required:'Please enter name',
        },
        'date':{
          required:'Please select date',
        },
        'language':{
          required:'Please enter title',
        },
        'company_files':{
          required: "Please upload pdf file"
        }
      },
      errorPlacement: function(error, element) {
         if(element.attr("name") == "date"){
          error.insertAfter(".custom_date_message")
        }else{
            error.insertAfter(element);
        }
      }
    });
    $.validator.addMethod("noSpace", function(value, element) {
      return value == '' || value.trim().length != 0;
    },'Space are not allowed');

    $.validator.addMethod("allowedCharacter", function(value, element) {
        const regex = /^[a-zA-Z\s]+$/;
        return regex.test(value);
    }, 'Special Characters are not allowed');

    $.validator.addMethod("summernoteRequired", function(value, element) {
        return $('#summernote').summernote('isEmpty') == false;
    }, "This field is required.");

    $.validator.addMethod("validate_file_type",function(val,elem) {
      var files = $('#'+elem.id)[0].files;
      for(var i=0;i<files.length;i++){
          var fname = files[i].name.toLowerCase();
          var size =  files[i].size;
          var re = /(\.jpg|\.png|\.jpeg|\.webp|\.gif|\.doc|\.docx|\.xlsx|\.xls|\.pdf)$/i;
          if(!re.exec(fname)){
              console.log("File extension not supported!");
              return false;
          }
      }
      return true;
    },"Only jpg, png, jpeg, webp, gif, doc, docx, xlsx, xls and pdf extensions are allowed.");
    $.validator.addMethod("validate_size_type",function(val,elem) {
      var files = $('#'+elem.id)[0].files;
      for(var i=0;i<files.length;i++){
          var fname = files[i].name.toLowerCase();
          var size =  files[i].size;
          if(size > 2000000){
              console.log("File extension not supported!");
              return false;
          }
      }
      return true;
    },"File is too big Max filesize 20MB");

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

  });
</script>
@endsection
