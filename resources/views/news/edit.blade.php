@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add News</h1>
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
              <h3 class="card-title">News Details</h3>
            </div>
            <form action="{{ route('news.update', $news->id) }}" method="post" id="editNewsForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Date:</label>
                    <div class="input-group date custom_date_message" id="reservationdate" data-target-input="nearest">
                      <input type="text" id="date" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('date', $news->date) }}" />
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                    @error('date')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Type<span style="color: red;">*</span></label>
                    <select class="form-control" id="type" name="type">
                      <option value="">Select Type</option>
                      <option value="1" {{ old('type', $news->type) == 1 ? 'selected' : '' }} >Company News</option>
                      <option value="2" {{ old('type', $news->type) == 2 ? 'selected' : '' }} >Product Updates</option>
                    </select>
                    @error('type')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Title<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ old('title', $news->title) }}">
                    @error('title')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Description<span style="color: red;">*</span></label>
                    <textarea id="summernote" name="description">{{ old('description', $news->description) }}</textarea>
                    @error('description')
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
                <div class="form-group">
                  <label>Current Images</label>
                  <div class="row">
                      @foreach($news->images as $image)
                      <div class="col-md-3">
                          <div class="card">
                              <img src="/img/news_images/feature_image/{{$image->images}}" alt="News Image" class="card-img-top img-fluid">
                          </div>
                      </div>
                      @endforeach
                  </div>
                </div>
              </div>
              <div class="card-footer" style="float: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{!! url('admin/news')!!}" class="btn btn-warning">Back</a>
              </div>
            </form>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote({
      height: 300 // Set the height here
    });
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    var siteUrl = "{{ config('app.site_url') }}";
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

    $('.delete-image').click(function() {
      var imageId = $(this).data('id');
      var $card = $(this).closest('.card');
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
            url: siteUrl+'admin/news_images/'+imageId,
            type: 'DELETE',
            data: {
              _token: '{{ csrf_token() }}'
            },
            success: function(result) {
              $card.remove();
            }
          });
        }
      });

    });

  });
</script>
@endsection
