@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Event</h1>
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
              <h3 class="card-title">Event Details</h3>
            </div>
            <form action="{{ route('events.update', $events->id) }}" method="post" id="editEventsForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>From Date:<span style="color: red;">*</span></label>
                    <div class="input-group date custom_from_date_message" id="reservationfromdate" data-target-input="nearest">
                      <input type="text" id="from_date" name="from_date" class="form-control datetimepicker-input" data-target="#reservationfromdate" value="{{ old('from_date', $events->from_date) }}"/>
                      <div class="input-group-append" data-target="#reservationfromdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                    @error('from_date')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>To Date:<span style="color: red;">*</span></label>
                    <div class="input-group date custom_to_date_message" id="reservationtodate" data-target-input="nearest">
                      <input type="text" id="to_date" name="to_date" class="form-control datetimepicker-input" data-target="#reservationtodate" value="{{ old('to_date', $events->to_date) }}"/>
                      <div class="input-group-append" data-target="#reservationtodate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                    @error('to_date')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Title<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ old('title', $events->title) }}">
                    @error('title')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Description<span style="color: red;">*</span></label>
                    <textarea id="summernote" name="description">{{ old('description', $events->description) }}</textarea>
                    @error('description')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Location<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="location" id="location" placeholder="Enter location" value="{{ old('location', $events->location) }}">
                    @error('location')
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
                <div class="form-group">
                  <label>Current Images</label>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="card">
                        <input type="hidden" name="exist_image" id="exist_image" value="{{$events->featured_image}}">
                        <img src="/img/events_images/feature_image/{{$events->featured_image}}" alt="News Image" class="card-img-top img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer" style="float: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{!! url('admin/events')!!}" class="btn btn-warning">Back</a>
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
    $('#reservationfromdate').datetimepicker({
      format: 'YYYY-MM-DD hh:mm A',
      icons: {
        time: 'far fa-clock', // FontAwesome clock icon
        date: 'far fa-calendar',
        up: 'fas fa-chevron-up',
        down: 'fas fa-chevron-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-calendar-check',
        clear: 'fas fa-trash-alt',
        close: 'fas fa-times'
      }
    });
    $('#reservationtodate').datetimepicker({
      format: 'YYYY-MM-DD hh:mm A',
      icons: {
        time: 'far fa-clock', // FontAwesome clock icon
        date: 'far fa-calendar',
        up: 'fas fa-chevron-up',
        down: 'fas fa-chevron-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-calendar-check',
        clear: 'fas fa-trash-alt',
        close: 'fas fa-times'
      }
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
