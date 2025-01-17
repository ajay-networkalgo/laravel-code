@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add FAQ</h1>
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
              <h3 class="card-title">FAQ Details</h3>
            </div>
            <form action="{{ route('faq.save') }}" method="post" id="addFAQForm">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                <div class="col-md-6">
                    <label>Product Type<span style="color: red;">*</span></label>
                    <select name="product_type_id" id="product_type_id" class="form-control">
                      <option value="">--Select--</option>
                      @foreach($product_types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                      @endforeach
                    </select>
                    @error('product_type_id')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                      <label>Product:</label>
                      <select name="product_id" id="product_id" class="form-control">
                          <option value="">--Select--</option>
                          <!-- Options will be appended dynamically -->
                      </select>
                      @error('product_id')
                          <div class="error">{{ $message }}</div>
                      @enderror
                  </div>
            </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature Title<span style="color: red;">*</span></label>
                    <input type="text" id="feature_title" name="feature_title" class="form-control" placeholder="Enter Feature Title">
                    @error('feature_title')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature Content<span style="color: red;">*</span></label>
                    <textarea id="feature_content" name="feature_content" class="form-control" placeholder="Enter Feature Content"></textarea>
                    @error('feature_content')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              
              </div>
              <div class="card-footer" style="float: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{!! url('admin/faq')!!}" class="btn btn-warning">Back</a>
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
    $("#product_type_id").on('change', function () {
    var product_type_id = $(this).val();

    // Clear the product dropdown
    $("#product_id").html('<option value="">--Select--</option>');

    if (product_type_id) {
        $.ajax({
            type: 'GET',
            url: `/admin/faq/getproducts`, 
            data: { product_type_id: product_type_id },
            success: function (response) {
                if (response.products.length > 0) {
                    response.products.forEach(function (product) {
                        $("#product_id").append(
                            `<option value="${product.id}">${product.name}</option>`
                        );
                    });
                } else {
                    alert("No products found for this type.");
                }
            },
            error: function () {
                alert("An error occurred. Please try again.");
            }
        });
    }
});

    
  });
</script>
@endsection
