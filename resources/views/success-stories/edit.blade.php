@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Success Stories</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <form action="{{route('success_story.update', $successStory->id)}}" method="post" id="AeditSuccessStoriesForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Type<span style="color: red;">*</span></label>
                    <select class="form-control" name="type" id="type">
                      <option value="">Select</option>
                      @foreach($types as $key => $type)
                        <option value="{{$key}}" {{ $successStory->type == $key ? 'selected' : '' }}>{{$type}}</option>
                      @endforeach
                    </select>
                    @error('type')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Country<span style="color: red;">*</span></label>
                    <select class="form-control" name="country" id="country">
                      <option value="">Select</option>
                      @foreach($countries as $key => $country)
                        <option value="{{$country->name}}" {{ $successStory->country == $country->name ? 'selected' : '' }}>{{$country->name}}</option>
                      @endforeach
                    </select>
                    @error('country')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Details<span style="color: red;">*</span></label>
                    <textarea class="form-control" name="details" id="details">{{ old('details', $successStory->details) }}</textarea>
                    @error('details')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Featured image(Size: 400*300px)</label>
                    <input type="file" name="featured_images" id="featured_images" class="form-control">
                    @error('featured_images')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="row" id="fileUpload" style="display: none;font-size: 18px;margin-top: 15px;">
                    <p>Your selected files here</p>
                  </div>
                </div>
                @if(!empty($successStory->feature_image))
                <div class="form-group">
                  <label>Current Images</label>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="card">
                        <img src="/img/success_stories_images/{{$successStory->feature_image}}" alt="News Image" class="card-img-top img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
                @endif
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Related Products<span style="color: red;">*</span></label>
                    <select name="related_products[]" id="related_products" class="form-control related_all_product" multiple="multiple">
                      <option value="">Select Related Products</option>
                      @foreach($products as $product)
                        <option value="{{$product->id}}" {{ in_array($product->id, $relatedProductIds) ? 'selected' : '' }}>{{$product->name}}</option>
                      @endforeach
                    </select>
                    @error('related_products')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="card-footer" style="float: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{!! url('admin/succes-stories')!!}" class="btn btn-warning">Back</a>
              </div>
            </form>
        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $("#editSuccessStoriesForm").validate({
      ignore: [],
      debug: false,
      rules: {
        'type':{
          required:true,
        },
        'country':{
          required:true,
        },
        'details':{
          required: true,
        },
        'featured_images':{
          validate_file_type:true,
          validate_size_type:true,
        }
      },
      messages:{
        'type':{
          required:'Please select type',
        },
        'country':{
          required:'Please select country',
        },
        'details':{
          required: "Please enter details."
        }
      }
    });
    $.validator.addMethod("noSpace", function(value, element) {
      return value == '' || value.trim().length != 0;
    },'Space are not allowed');

    $.validator.addMethod("validate_file_type",function(val,elem) {
      var files = $('#'+elem.id)[0].files;
      for(var i=0;i<files.length;i++){
          var fname = files[i].name.toLowerCase();
          var size =  files[i].size;
          var re = /(\.jpg|\.png|\.jpeg|\.webp)$/i;
          if(!re.exec(fname)){
              console.log("File extension not supported!");
              return false;
          }
      }
      return true;
    },"Only Image allowed");
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

    $(document).on('change','#featured_images',function(){
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
