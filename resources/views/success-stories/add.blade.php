@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Success Stories</h1>
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
            <form action="{{route('success_story.save')}}" method="post" id="AaddSuccessStoriesForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Type<span style="color: red;">*</span></label>
                    <select class="form-control" name="type" id="type">
                      <option value="">Select</option>
                      @foreach($types as $key => $type)
                        <option value="{{$key}}" <?php echo (old('type') == $key) ? 'selected' : ''; ?>>{{$type}}</option>
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
                        <option value="{{$country->name}}" <?php echo (old('country') == $country->name) ? 'selected' : ''; ?>>{{$country->name}}</option>
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
                    <textarea class="form-control" name="details" id="details">{{ old('details') }}</textarea>
                    @error('details')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Featured image(Size: 400*300px)<span style="color: red;">*</span></label>
                    <input type="file" name="featured_images" id="featured_images" class="form-control">
                    @error('featured_images')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="row" id="fileUpload" style="display: none;font-size: 18px;margin-top: 15px;">
                    <p>Your selected files here</p>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Related Products<span style="color: red;">*</span></label>
                    <select name="related_products[]" id="related_products" class="form-control related_all_product" multiple="multiple">
                      <option value="">Select Related Products</option>
                      @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
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

      $('#featured_images').removeData('imageWidth');
      $('#featured_images').removeData('imageHeight');
      var file = this.files[0];
      var tmpImg = new Image();
      tmpImg.src=window.URL.createObjectURL( file );
      tmpImg.onload = function() {
        width = tmpImg.naturalWidth,
        height = tmpImg.naturalHeight;
        $('#featured_images').data('imageWidth', width);
        $('#featured_images').data('imageHeight', height);
      }
    });
  });
</script>
@endsection
