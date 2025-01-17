@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Product</h1>
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
              <h3 class="card-title">Product Details</h3>
            </div>
            <form action="{{ route('products.update',$products->id) }}" method="post" id="editProductForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Product Category:</label>
                    <select name="product_category_id" id="product_category_id" class="form-control">
                      <option value="">--Select--</option>
                      @foreach($product_category as $category)
                        <option value="{{ $category->id }}" {{ $products->product_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                      @endforeach
                    </select>
                    @error('product_category_id')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Title<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter title" value="{{ old('name', $products->name) }}">
                    @error('name')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Slug<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter slug" value="{{ old('slug', $products->slug) }}">
                    @error('slug')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Description<span style="color: red;">*</span></label>
                    <textarea id="description" name="description" class="form-control" placeholder="Enter description">{{ old('description', $products->description) }}</textarea>
                    @error('description')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Featured image<span style="color: red;">*</span></label>
                    <input type="file" name="featured_images" id="featured_images" class="form-control">
                    @error('featured_images')
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
                        <input type="hidden" name="exist_image" id="exist_image" value="{{$products->feature_image}}">
                        <img src="/img/product_images/{{$products->feature_image}}" alt="News Image" class="card-img-top img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer" style="float: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{!! url('admin/products')!!}" class="btn btn-warning">Back</a>
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

    $('#name').on('input',function() {
      let name = $(this).val();
      let slug = name.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');
      $('#slug').val(slug);
    });

  });
</script>
@endsection
