@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Page</h1>
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
              <h3 class="card-title">Page Details</h3>
            </div>
            <form action="{{ route('page.update',$page->id) }}" method="post" id="editPageForm">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Title<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ old('title', $page->title) }}">
                    @error('title')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Slug<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter slug" value="{{ old('slug', $page->slug) }}">
                    @error('slug')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Short Description<span style="color: red;">*</span></label>
                    <textarea id="short_description" name="short_description" class="form-control" placeholder="Enter short description">{{ old('short_description', $page->short_description) }}</textarea>
                    @error('short_description')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Description<span style="color: red;">*</span></label>
                    <textarea id="description" name="description" class="form-control" placeholder="Enter description">{{ old('description', $page->description) }}</textarea>
                    @error('description')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                  <label>SEO Setting</label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Meta Title<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter title" value="{{ old('meta_title', $page->meta_title) }}">
                    @error('meta_title')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Meta Description<span style="color: red;">*</span></label>
                    <textarea id="meta_description" name="meta_description" class="form-control" placeholder="Enter meta description">{{ old('meta_description', $page->meta_description) }}</textarea>
                    @error('meta_description')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Meta Keywords<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="Enter meta keywords" value="{{ old('meta_keywords', $page->meta_keywords) }}">
                    @error('meta_keywords')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Page <span style="color: red;">*</span></label>
                    <select name="page_id" id="page_id" class="form-control">
                      <option value="">--Select--</option>
                      @foreach($menulist as $menu)
                        <option value="{{ $menu->id }}" {{ $page->page_id == $menu->id ? 'selected' : '' }}>{{ $menu->Olax_menu_name }}</option>
                      @endforeach
                    </select>
                    @error('page_id')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="card-footer" style="float: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{!! url('admin/page')!!}" class="btn btn-warning">Back</a>
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
<script>
  $(function () {
    // Summernote
    $('#description').summernote({
      height: 300 // Set the height here
    });
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
  });
</script>
@endsection
