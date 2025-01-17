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
            <form action="{{ route('product-categories.update',$productcategory->id) }}" method="post" id="editProductCategoryForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Product Type:</label>
                    <select name="product_type_id" id="product_type_id" class="form-control">
                      <option value="">--Select--</option>
                      @foreach($product_type as $type)
                        <option value="{{ $type->id }}" {{ $productcategory->product_type_id == $type->id ? 'selected' : '' }}>{{ $productcategory->name }}</option>
                      @endforeach
                    </select>
                    @error('product_type_id')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Title<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter title" value="{{ old('name', $productcategory->name) }}">
                    @error('name')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Description<span style="color: red;">*</span></label>
                    <textarea id="description" name="description" class="form-control" placeholder="Enter description">{{ old('description', $productcategory->description) }}</textarea>
                    @error('description')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature image<span style="color: red;">*</span></label>
                    <input type="file" name="feature_image" id="feature_image" class="form-control">
                    @error('feature_image')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="row" id="fileUpload" style="display: none;font-size: 18px;margin-top: 15px;">
                    <p>Your selected files here</p>
                  </div>
                </div>
                <div class="form-group">
                  <label>Current Images</label>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="card">
                        <input type="hidden" name="exist_image" id="exist_image" value="{{$productcategory->feature_image}}">
                        <img src="/img/product_images/{{$productcategory->feature_image}}" alt="News Image" class="card-img-top img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer" style="float: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{!! url('admin/product-categories')!!}" class="btn btn-warning">Back</a>
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
