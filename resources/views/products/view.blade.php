@extends('layout.admin') @section('page-content') <div class="content-wrapper">
<section class="content-header">
  <h1>Product Details</h1>
  <hr>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <!-- News Details -->
        <div class="card-header">
          <h3 class="card-title">Product Featured Section</h3>
        </div>
        <div class="card-body">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $products->title }} </h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p>
                    <strong>Description:</strong>
                  </p>
                  <p>{!! $products->small_desc !!}</p>
                </div>
              </div> <?php if(!empty($products->feature_image)){?> <div class="row">
                <div class="col-md-12">
                  <h4>Featured Image</h4>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="card">
                        <img src="/img/product_images/{{$products->feature_image}}" class="card-img-top img-fluid" alt="News Image">
                      </div>
                    </div>
                  </div>
                </div>
              </div> <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Slider Section</h3>
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addProductSliderImagedModal" style="float:right;"> Add Slider </button>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <div class="col-md-12" style="overflow-y: auto; max-height: 250px;">
                  <table class="table table-bordered" id="product-slider-table">
                    <thead>
                    <tr>
                    <th class="text-center">Image</th>
                    <th class="text-center">Action</th>
                  </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Product Features Section</h3>
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addProductFeaturesModal" style="float:right;"> Add Product Feature </button>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <div class="col-md-12">
                  <table class="table table-bordered" id="product-feature-table">
                    <thead>
                      <tr>
                        <th>Feature Label</th>
                        <th>Feature Value</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Product Specification Section</h3>
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addProductSpecificationModal" style="float:right;"> Add Product Specification </button>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <div class="col-md-12">
              <table class="table table-bordered" id="product-specification-table">
                <thead>
                  <tr>
                    <th>Specification Label</th>
                    <th>Specification Key</th>
                    <th>Specification Value</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Asset Section</h3>
              </div>
              <div class="card-body">
              <form  method="post" id="AboutPageContentForm" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="product_id" value="{{ $products->id }}">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_asset_title" id="product_asset_title" >
                  </div>
                  <div class="col-md-6">
                    <label>Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_asset_sub_title" id="product_asset_sub_title">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Content <span style="color: red;">*</span>
                    </label>
                    <textarea name="product_asset_content" id="product_asset_content" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Image or Video one<span style="color: red;">*</span>
                    </label>&nbsp;&nbsp;
                    <input type="radio" name="input_type_one" id="file_type_one" >
                    <label for="file_type_one">File</label>
                    <input type="radio" name="input_type_one" id="url_type_one">
                    <label for="url_type_one">URL</label>
                    <div id="input_container_one">
                    <input type="file" class="form-control" name="product_asset_image_or_video_one" id="product_asset_image_or_video_one" placeholder="Enter required field">
                    <span id="curent_file_one"></span>
                  </div>
                  </div>
                  <div class="col-md-6">
                    <label>Image or Video two <span style="color: red;">*</span>
                    </label>&nbsp;&nbsp;
                    <input type="radio" name="input_type_two" id="file_type_two" >
                    <label for="file_type_two">File</label>
                    <input type="radio" name="input_type_two" id="url_type_two">
                    <label for="url_type_two">URL</label>
                    <div id="input_container_two">
                    <input type="file" class="form-control" name="product_asset_image_or_video_two" id="product_asset_image_or_video_two">
                    <span id="curent_file_two"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                        <div class="card-footer" style="margin-top:20px">
                          <input type="submit" class="btn btn-primary" name="save_and_preview" value="Save Product Asset">
                        </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>
    <div class="modal fade" id="viewProductSpecificationModal" tabindex="-1" role="dialog" aria-labelledby="viewProductSpecificationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewProductSpecificationModalLabel">Product Specification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="form-group">
          <label for="specification_label">Specification Label</label>
          <input type="text" name="specification_label_view" id="specification_label_view" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="specification_key">Specification Key</label>
          <input type="text" name="specification_key_view" id="specification_key_view" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="specification_value">Specification Value</label>
          <input type="text" name="specification_value_view" id="specification_value_view" class="form-control" readonly>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
    
    <div class="modal fade" id="addProductSliderImagedModal" tabindex="-1" role="dialog" aria-labelledby="addProductSliderImagedModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addProductSliderImagedModalLabel">Add Slider Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="addProductSliderImagedForm" enctype="multipart/form-data" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-md-12">
                  <label>Image <span style="color: red;">*</span>
                  </label>
                  <input type="file" name="image" id="image" class="form-control">
                  <input type="hidden" name="product_id" value="{{ $products->id }}"> @error('image') <div class="error">{{ $message }}</div> @enderror
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Slide</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="viewProductFeaturesModal" tabindex="-1" role="dialog" aria-labelledby="viewProductFeaturesModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="veiwProductFeaturesModalLabel">Product Features</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <form id="#">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="form-group">
                <label for="feature_category">Feature Label</label>
                <input type="text" name="feature_category_view" id="feature_category_view" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="feature_category">Feature Value</label>
                <input type="text" name="feature_key_value_view" id="feature_key_value_view" class="form-control" readonly>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      <div class="modal fade" id="addProductFeaturesModal" tabindex="-1" role="dialog" aria-labelledby="addProductFeaturesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addProductFeaturesModalLabel">Add Product Features</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="productFeaturesForm" enctype="multipart/form-data" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="product_id" value="{{ $products->id }}">
              <div class="modal-body">
                <!-- Feature Label -->
                <div class="form-group">
                  <label for="feature_category">Feature Label</label>
                  <input type="text" name="feature_category" id="feature_category" class="form-control" placeholder="Enter feature label">
                </div>
                <!-- Feature Values Container -->
                <div id="featureValuesContainer">
                  <label>Feature Values:</label>
                  <div class="feature-value-row form-group row align-items-center">
                    <div class="col-md-10">
                      <input type="text" name="feature_key_value[]" class="form-control feature-value-input" placeholder="Enter feature value">
                    </div>
                    <div class="col-md-2 text-right">
                      <button type="button" class="btn btn-danger removeFeatureButton">Delete</button>
                    </div>
                  </div>
                </div>
                <!-- Add More Values Button -->
                <div class="text-right mb-3">
                  <button type="button" id="addFeatureValueButton" class="btn btn-primary">Add Value</button>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save Features</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="addProductSpecificationModal" tabindex="-1" role="dialog" aria-labelledby="addProductSpecificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addProductSpecificationModalLabel">Add Product Specification</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="productSpecificationForm" enctype="multipart/form-data" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="product_id" value="{{ $products->id }}">
              <div class="modal-body">
                <div class="form-group">
                    <label for="specification_label">Specification Label:</label>
                      <input type="text" name="specification_label" id="specification_label" class="form-control">
                </div>
                <div id="specificationContainer">
                  <div class="specification-key-value-row form-group row align-items-center">
                    <div class="col-md-5">
                      
                      <label>Specification Key:</label>
                      <input type="text" name="specification_key[]" class="form-control specification-key-input" placeholder="Enter specification key">
                    </div>
                    <div class="col-md-5">
                    <label>Specification Value:</label>
                      <input type="text" name="specification_value[]" class="form-control specification-value-input" placeholder="Enter specification value">
                    </div>
                    <div class="col-md-2 text-right" style="margin-top:25px !important">
                      <button type="button" class="btn btn-danger removeSpecificationButton">Delete</button>
                    </div>
                  </div>
                </div>
                <!-- Add More Values Button -->
                <div class="text-right mb-3">
                  <button type="button" id="addSpecificationValueButton" class="btn btn-primary">Add</button>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save Specification</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="editProductSpecificationModal" tabindex="-1" role="dialog" aria-labelledby="editProductSpecificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editProductSpecificationModalLabel">edit Product Specification</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="editproductSpecificationForm" enctype="multipart/form-data" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="specificationId" name="id">
              <div class="modal-body">
                <div class="form-group">
                    <label for="specification_label">Specification Label:</label>
                      <input type="text" name="specification_label" id="specification_label_id" class="form-control">
                </div>
                <div id="specificationContainer">
                  <div class="specification-key-value-row form-group row align-items-center">
                    <div class="col-md-5">
                      
                      <label>Specification Key:</label>
                      <input type="text" name="specification_key"  id="specification_key" class="form-control specification-key-input" placeholder="Enter specification key">
                    </div>
                    <div class="col-md-5">
                    <label>Specification Value:</label>
                      <input type="text" name="specification_value"  id="specification_value"  class="form-control specification-value-input" placeholder="Enter specification value">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update Specification</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      

      
      <div class="modal fade" id="editProductSliderModal" tabindex="-1" role="dialog" aria-labelledby="editSliderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editSliderModalLabel">Edit Product Slider</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="editSliderForm" enctype="multipart/form-data" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="modal-body">
                <input type="hidden" id="sliderId" name="id">
                <div class="form-group">
                  <label for="sliderImage">Image</label>
                  <input type="file" id="sliderImage" name="image" class="form-control">
                  <img id="sliderImagePreview" src="#" alt="Slider Image" class="img-fluid mt-2">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Slider</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="editProductFeaturesModal" tabindex="-1" role="dialog" aria-labelledby="editProductFeaturesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editProductFeaturesModalLabel">Update Product Features</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="editproductFeaturesForm" enctype="multipart/form-data" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="featureId" name="id">
              <div class="modal-body">
                <!-- Feature Label -->
                <div class="form-group">
                  <label for="feature_category">Feature Label</label>
                  <input type="text" name="feature_category" id="feature_category_update" class="form-control" placeholder="Enter feature label">
                </div>
                <!-- Feature Values Container -->
                <div id="featureValuesContainer">
                  <label>Feature Values:</label>
                  <div class="feature-value-row form-group row align-items-center">
                    <div class="col-md-10">
                      <input type="text" name="feature_key_value" id="feature_key_value_update" class="form-control feature-value-input" placeholder="Enter feature value">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Update Feature</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="viewProductSliderModal" tabindex="-1" role="dialog" aria-labelledby="viewSliderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editSliderModalLabel">Product Slider Image</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <img id="sliderImageView" src="#" alt="Slider Image" class="img-fluid mt-2">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      
      
    </div>
      <div class="box-footer">
        <div class="text-right">
          <a href="{{ route('products.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Back to Product List </a>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<form action="#" method="post">
  <input type="hidden" name="product_id_val" id="product_id_val" value="{{ $products->id }}">
</form>

<script>
  
  $(document).ready(function () {
    var siteUrl = "{{ config('app.site_url') }}";
    let productid = $("#product_id_val").val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    
    
    
    var product_slider_table = $('#product-slider-table').DataTable({
    processing: true,
    serverSide: true,
    pageLength: 3, 
    ajax: {
        url: '{{ route("product-slider.index") }}',  
        type: 'GET',
        data: function (d) {
            d.product_id = {{ $products->id }};  
        }
    },
    columns: [
        { data: 'image', name: 'image' },
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
});

    $('#addProductSliderImagedForm').on('submit', function(e) {
        e.preventDefault();  
        var formData = new FormData(this); 
        $.ajax({
            url: '{{ route("product-slider.store") }}',  
            method: 'POST',
            data: formData,
            processData: false,  
            contentType: false, 
            success: function(response) {
                if (response.success) {
                   
                    $('#addProductSliderImagedModal').modal('hide');
                    $('#addProductSliderImagedForm')[0].reset();
                    Swal.fire({
                    title: 'Success!',
                    text: 'Product slider Added successfully.',
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: false
                });
                product_slider_table.ajax.reload(null, false);
                    
                } 
            },
            error: function(xhr, status, error) {
                
                alert('Something went wrong, please try again.');
            }
        });
    });
    
    
    var product_feature_table = $('#product-feature-table').DataTable({
    processing: true,
    serverSide: true,
    pageLength: 10, 
    ajax: {
        url: '{{ route("product-feature.index") }}',  
        type: 'GET',
        data: function (d) {
            d.product_id = {{ $products->id }};  
        }
    },
    columns: [
        { data: 'feature_category', name: 'feature_category' },
        { data: 'feature_key_value', name: 'feature_key_value' },
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
   
});

   
    $("#productFeaturesForm").on('submit', function(e) {
  e.preventDefault();
  
  let isValid = true; 
  var feature_category = $('input[name="feature_category"]').val();
if (!feature_category.trim()) {
  isValid = false;
  var $inputField = $('input[name="feature_category"]');
  $inputField.next('label.error').remove();
  $inputField.after('<label class="error">Please enter category</label>');
} else {
  $('input[name="feature_category"]').next('label.error').remove(); 
}



  $('input[name="feature_key_value[]"]').each(function() {
    if (!$(this).val().trim()) {
      isValid = false;
      $(this).next('label.error').remove();
      $(this).after('<label class="error">Please enter feature value</label>');
    } else {
      $(this).next('label.error').remove();
    }
  });

  // If all validations pass, submit the form
  if (isValid) {
    //this.submit();
    var formData = new FormData(this); 
        $.ajax({
            url: '{{ route("product-feature.store") }}',  
            method: 'POST',
            data: formData,
            processData: false,  
            contentType: false, 
            success: function(response) {
                if (response.success) {
                   
                    $('#addProductFeaturesModal').modal('hide');
                    $('#productFeaturesForm')[0].reset();
                    Swal.fire({
                    title: 'Success!',
                    text: 'Product Feature Added successfully.',
                    icon: 'success',
                    showConfirmButton: true
                });
                   
                product_feature_table.ajax.reload(null, false);
                } 
            },
            error: function(xhr, status, error) {
                
                alert('Something went wrong, please try again.');
            }
        });
  }
});


    $("#productSpecificationForm").on('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;
        var specification_label = $('input[name="specification_label"]').val();
        if (!specification_label.trim()) {
          isValid = false;
          var $inputField = $('input[name="specification_label"]');
          $inputField.next('label.error').remove();
          $inputField.after('<label class="error">Please enter specification label</label>');
        } else {
          $('input[name="specification_label"]').next('label.error').remove(); 
        }
        $('input[name="specification_key[]"]').each(function() {
            if (!$(this).val().trim()) {
            isValid = false;
            $(this).next('label.error').remove();
            $(this).after('<label class="error">Please enter specification key</label>');
            } else {
            $(this).next('label.error').remove();
            }
        });
        $('input[name="specification_value[]"]').each(function() {
            if (!$(this).val().trim()) {
            isValid = false;
            $(this).next('label.error').remove();
            $(this).after('<label class="error">Please enter specification value</label>');
            } else {
            $(this).next('label.error').remove();
            }
        });
  if (isValid) {
    //this.submit();
    var formData = new FormData(this); 
        $.ajax({
            url: '{{ route("product-specification.store") }}',  
            method: 'POST',
            data: formData,
            processData: false,  
            contentType: false, 
            success: function(response) {
                if (response.success) {
                   
                    $('#addProductSpecificationModal').modal('hide');
                    $('#productSpecificationForm')[0].reset();
                    Swal.fire({
                    title: 'Success!',
                    text: 'Product Specification Added successfully.',
                    icon: 'success',
                    showConfirmButton: true
                });
                   
                product_specification_table.ajax.reload(null, false); 
                } 
            },
            error: function(xhr, status, error) {
                
                alert('Something went wrong, please try again.');
            }
        });
  }
});
  
var product_specification_table = $('#product-specification-table').DataTable({
    processing: true,
    serverSide: true,
    pageLength: 10, 
    ajax: {
        url: '{{ route("product-specification.index") }}',  
        type: 'GET',
        data: function (d) {
            d.product_id = {{ $products->id }};  
        }
    },
    columns: [
        { data: 'specification_label', name: 'specification_label' },
        { data: 'specification_key', name: 'specification_key' },
        { data: 'specification_value', name: 'specification_value' },
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
   
});
$(document).on('click', '.editSliderRecord', function () {
    const encryptId = $(this).attr('id'); 
    

    $.ajax({
        url: `/admin/product-slider/edit/${encryptId}`, 
        method: 'GET',
        success: function (response) {
            if (response.success) {
                $('#sliderImagePreview').attr('src', response.data.image);
                $('#sliderId').val(response.data.id); 
                $('#editProductSliderModal').modal('show');
            } else {
                alert('Error fetching slider details');
            }
        },
        error: function () {
            alert('An error occurred while fetching slider details');
        }
    });
});
$('#editSliderForm').on('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const sliderId = $('#sliderId').val();

    $.ajax({
        url: '{{ route("product-slider.update") }}', 
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Product slider updated successfully.',
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: false
                });
                $('#editProductSliderModal').modal('hide');
                product_slider_table.ajax.reload(null, false);
            } else {
              Swal.fire({
                    title: 'Error!',
                    text: 'Failed to update product slider: ' + response.message,
                    icon: 'error'
                });
            }
        },
        error: function (xhr) {
            alert('An error occurred while updating the slider');
        }
    });
});
$(document).on('click', '.viewSliderRecord', function () {
    const encryptId = $(this).attr('id'); 
    

    $.ajax({
        url: `/admin/product-slider/view/${encryptId}`, 
        method: 'GET',
        success: function (response) {
            if (response.success) {
                $('#sliderImageView').attr('src', response.data.image);
                $('#sliderId').val(response.data.id); 
                $('#viewProductSliderModal').modal('show');
            } else {
                alert('Error fetching slider details');
            }
        },
        error: function () {
            alert('An error occurred while fetching slider details');
        }
    });
});

$(document).on('click', '.deleteSliderRecord', function (e) { 
      var encryptId = $(this).attr('id');
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "DELETE",
            url: `/admin/product-slider/delete/${encryptId}`, 
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status == true) {
                  Swal.fire({
                    title: "Slider deleted!",
                    icon: "success"
                  });
                product_slider_table.ajax.reload(null, false);
                }
            },
            error: function (response) {
                alert('Error deleting slider item.');
            }
          });
        }
      });
    });
    $(document).on('click', '.editFeatureRecord', function () {
    const encryptId = $(this).attr('id');
    $.ajax({
        url: `/admin/product-feature/edit/${encryptId}`,
        method: 'GET',
        success: function (response) {
            if (response.success) {
                $("#feature_category_update").val(response.data.feature_category);
                $("#feature_key_value_update").val(response.data.feature_key_value);
                $('#featureId').val(response.data.id);
                $('#editProductFeaturesModal').modal('show');
            } else {
                alert('Error fetching Features details');
            }
        },
        error: function () {
            alert('An error occurred while fetching Features details');
        }
    });
});
$('#editproductFeaturesForm').on('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const featureId = $('#featureId').val();

    $.ajax({
        url: '{{ route("product-feature.update") }}', 
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Product Feature updated successfully.',
                    icon: 'success',
                    showConfirmButton: true
                });
                $('#editProductFeaturesModal').modal('hide');
                product_feature_table.ajax.reload(null, false);
            } else {
              Swal.fire({
                    title: 'Error!',
                    text: 'Failed to update product Feature: ' + response.message,
                    icon: 'error'
                });
            }
        },
        error: function (xhr) {
            alert('An error occurred while updating the slider');
        }
    });
});
$(document).on('click', '.viewFeatureRecord', function () {
    const encryptId = $(this).attr('id');
    $.ajax({
        url: `/admin/product-feature/view/${encryptId}`,
        method: 'GET',
        success: function (response) {
            if (response.success) {
                $("#feature_category_view").val(response.data.feature_category);
                $("#feature_key_value_view").val(response.data.feature_key_value);
                $('#viewProductFeaturesModal').modal('show');
            } else {
                alert('Error fetching Features details');
            }
        },
        error: function () {
            alert('An error occurred while fetching Features details');
        }
    });
});
$(document).on('click', '.deleteFeatureRecord', function (e) { 
      var encryptId = $(this).attr('id');
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "DELETE",
            url: `/admin/product-feature/delete/${encryptId}`, 
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status == true) {
                  Swal.fire({
                    title: "Feature deleted!",
                    icon: "success"
                  });
                product_feature_table.ajax.reload(null, false);
                }
            },
            error: function (response) {
                alert('Error deleting feature item.');
            }
          });
        }
      });
    });
    $(document).on('click', '.editSpecificationRecord', function () {
      const encryptId = $(this).attr('id');
      $.ajax({
          url: `/admin/product-specification/edit/${encryptId}`,
          method: 'GET',
          success: function (response) {
              if (response.success) {
                  $("#specification_label_id").val(response.data.specification_label);
                  $("#specification_key").val(response.data.specification_key);
                  $("#specification_value").val(response.data.specification_value);
                  $('#specificationId').val(response.data.id);
                  $('#editProductSpecificationModal').modal('show');
              } else {
                  alert('Error fetching Features details');
              }
          },
          error: function () {
              alert('An error occurred while fetching Features details');
          }
      });
  });
  $('#editproductSpecificationForm').on('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const specificationId = $('#specificationId').val();

        $.ajax({
            url: '{{ route("product-specification.update") }}', 
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Product Specification updated successfully.',
                        icon: 'success',
                        showConfirmButton: true
                    });
                    $('#editProductSpecificationModal').modal('hide');
                    product_specification_table.ajax.reload(null, false);
                } else {
                  Swal.fire({
                        title: 'Error!',
                        text: 'Failed to update product Feature: ' + response.message,
                        icon: 'error'
                    });
                }
            },
            error: function (xhr) {
                alert('An error occurred while updating the slider');
            }
        }); 
      });
      $(document).on('click', '.viewSpecificationRecord', function () {
    const encryptId = $(this).attr('id');
    $.ajax({
        url: `/admin/product-specification/view/${encryptId}`,
        method: 'GET',
        success: function (response) {
            if (response.success) {
                $("#specification_label_view").val(response.data.specification_label);
                $("#specification_key_view").val(response.data.specification_key);
                $("#specification_value_view").val(response.data.specification_value);
                $('#viewProductSpecificationModal').modal('show');
            } else {
                alert('Error fetching Features details');
            }
        },
        error: function () {
            alert('An error occurred while fetching Features details');
        }
    });
});
$(document).on('click', '.deleteSpecificationRecord', function (e) { 
      var encryptId = $(this).attr('id');
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "DELETE",
            url: `/admin/product-specification/delete/${encryptId}`, 
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status == true) {
                  Swal.fire({
                    title: "Specification deleted!",
                    icon: "success"
                  });
                product_specification_table.ajax.reload(null, false);
                }
            },
            error: function (response) {
                alert('Error deleting feature item.');
            }
          });
        }
      });
    });
    $("#file_type_one").on("change", function() {
    const inputType = $("#product_asset_image_or_video_one").attr('type');
    const $inputContainer = $('#input_container_one');

    $inputContainer.html('<input type="file" class="form-control" name="product_asset_image_or_video_one" id="product_asset_image_or_video_one">');

});
$("#url_type_one").on("change", function() {
    const $inputContainer = $('#input_container_one');

    $inputContainer.html('<input type="url" class="form-control" name="product_asset_image_or_video_one" id="product_asset_image_or_video_one" placeholder="please enter video url">');

});
$("#file_type_two").on("change", function() {
    const inputType = $("#product_asset_image_or_video_two").attr('type');
    const $inputContainer = $('#input_container_two');

    $inputContainer.html('<input type="file" class="form-control" name="product_asset_image_or_video_two" id="product_asset_image_or_video_two">');

});
$("#url_type_two").on("change", function() {
    const $inputContainer = $('#input_container_two');

    $inputContainer.html('<input type="url" class="form-control" name="product_asset_image_or_video_two" id="product_asset_image_or_video_two" placeholder="please enter video url">');

});
$("#AboutPageContentForm").on('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    $.ajax({
        url: '{{ route("product-asset.store") }}',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.success) {
                const productAsset = response.data;
                $('#product_asset_title').val(productAsset.product_asset_title);
                $('#product_asset_sub_title').val(productAsset.product_asset_sub_title);
                $('#product_asset_content').val(productAsset.product_asset_content);
                if (productAsset.product_asset_image_or_video_one) {
                    $("#curent_file_one").html(product_asset_image_or_video_one);
                }

                if (productAsset.product_asset_image_or_video_two) {
                  $("#curent_file_two").html(product_asset_image_or_video_two);
                }
                Swal.fire({
                    title: 'Success!',
                    text: 'Product Asset updated successfully.',
                    icon: 'success',
                    showConfirmButton: true
                });
            }
            console.log(response);
        },
        error: function(xhr, status, error) {

            alert('Something went wrong, please try again.');
        }
    });
});

$(document).ready(function() {
    const $featureValuesContainer = $('#featureValuesContainer');
    const $addFeatureValueButton = $('#addFeatureValueButton');
    $addFeatureValueButton.on('click', function() {
        const newRow = `
      <div class="feature-value-row form-group row align-items-center">
        <div class="col-md-10">
          <input type="text" name="feature_key_value[]" class="form-control feature-value-input" placeholder="Enter feature value">
        </div>
        <div class="col-md-2 text-right">
          <button type="button" class="btn btn-danger removeFeatureButton">Delete</button>
        </div>
      </div>
    `;
        $featureValuesContainer.append(newRow);
    });

    $featureValuesContainer.on('click', '.removeFeatureButton', function() {
        $(this).closest('.feature-value-row').remove();
    });
});
$(document).ready(function() {
    const productId = $('#product_id_val').val();

    if (productId) {
        $.ajax({
            url: '{{ route("product-asset.index") }}',
            type: 'GET',
            data: {
                product_id: productId
            },
            success: function(response) {
                if (response.success && response.data) {
                    const productAssets = response.data;
                    Object.keys(productAssets).forEach(key => {
                        const productAsset = productAssets[key];


                        if (key === "product_asset_title") {
                            $('#product_asset_title').val(productAsset.product_asset_value || '');
                        } else if (key === "product_asset_sub_title") {
                            $('#product_asset_sub_title').val(productAsset.product_asset_value || '');
                        } else if (key === "product_asset_content") {
                            $('#product_asset_content').val(productAsset.product_asset_value || '');
                        }else if(key === "product_asset_image_or_video_one"){
                          $('#curent_file_one').html(productAsset.product_asset_value || '');
                        }else if(key === "product_asset_image_or_video_two"){
                          $('#curent_file_two').html(productAsset.product_asset_value || '');
                        }
                        




                    });
                } else {
                    alert('No product asset data found.');
                }
            },
            error: function(xhr, status, error) {
                alert('Something went wrong while fetching the product asset data.');
                console.error('Error:', error);
            }
        });
    } else {
        alert('Product ID is missing.');
    }
});

$(document).ready(function() {
    const $specificationContainer = $('#specificationContainer');
    const $addSpecificationValueButton = $('#addSpecificationValueButton');


    $addSpecificationValueButton.on('click', function() {
        const newRow = `
       <div class="specification-key-value-row form-group row align-items-center">
                    <div class="col-md-5">
                      
                      <label>Specification Key:</label>
                      <input type="text" name="specification_key[]" class="form-control specification-key-input" placeholder="Enter specification key">
                    </div>
                    <div class="col-md-5">
                    <label>Specification Value:</label>
                      <input type="text" name="specification_value[]" class="form-control specification-value-input" placeholder="Enter specification value">
                    </div>
                    <div class="col-md-2 text-right" style="margin-top:25px !important">
                      <button type="button" class="btn btn-danger removeSpecificationButton">Delete</button>
                    </div>
                  </div>
    `;
        $specificationContainer.append(newRow);
    });


    $specificationContainer.on('click', '.removeSpecificationButton', function() {
        $(this).closest('.specification-key-value-row').remove();
    });
});
});

  
</script>
@endsection
@section('styles')
<style>
.card {
    position: relative;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
    margin-bottom: 15px;
}

.card-img-top {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.box-title {
    font-size: 24px;
    font-weight: bold;
}
.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
    color: white;
}
</style>

@endsection