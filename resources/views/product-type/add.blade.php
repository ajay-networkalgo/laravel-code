@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Product Type</h1>
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
              <h3 class="card-title">Product Type Details</h3>
            </div>
            <form action="{{ route('product-type.save') }}" method="post" id="addProductTypeForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                <div class="col-md-6">
                    <label>Slug<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter slug">
                    @error('slug')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Title<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter title">
                    @error('name')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Description<span style="color: red;">*</span></label>
                    <textarea id="description" name="description" class="form-control" placeholder="Enter description"></textarea>
                    @error('description')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Featured image<span style="color: red;">*</span></label>
                    <input type="file" name="feature_image" id="feature_image" class="form-control">
                    @error('feature_image')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="row" id="fileUpload" style="display: none;font-size: 18px;margin-top: 15px;">
                    <p>Your selected files here</p>
                  </div>
                </div>
              </div>
              <div class="card-footer" style="float: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{!! url('admin/products-types')!!}" class="btn btn-warning">Back</a>
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

    $(document).on('change','#feature_image',function(){
      var input = document.getElementById('feature_image');
      var block = $("#fileUpload").css('display','block');
      var output = document.getElementById('fileUpload');
      var children = "";
      children += '<p>Your selected files here</p>';
      for (var i = 0; i < input.files.length; ++i) {
          children += '<li>' + input.files.item(i).name + '</li>';
      }
      output.innerHTML = '<ul>'+children+'</ul>';
    });

    $('#name').on('input',function() {
      let name = $(this).val();
      let slug = name.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');
      $('#slug').val(slug);
    });
    
  });
</script>
@endsection
