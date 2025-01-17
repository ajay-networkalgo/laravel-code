@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Image Alt Tag</h1>
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
              <h3 class="card-title">Image Alt Tag Details</h3>
            </div>
            <form action="{{ route('image-alt-tag.save') }}" method="post" id="addImageAltTagForm">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                <div class="col-md-6">
                    <label>Url<span style="color: red;">*</span></label>
                    <input type="url" class="form-control" name="url" id="url" placeholder="Enter Image alt tag Url">
                    @error('url')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Path<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="path" id="path" placeholder="Enter Image alt tag path">
                    @error('name')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Text<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="text" id="text" placeholder="Enter Image alt tag text">
                    @error('text')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="card-footer" style="float: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{!! url('admin/image-alt-tag')!!}" class="btn btn-warning">Back</a>
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
    
  });
</script>
@endsection
