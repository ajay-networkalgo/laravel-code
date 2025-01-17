@extends('layout.admin') @section('page-content') <div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Blogs Page</h1>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('blogs_page.save') }}" method="post" id="BlogsPageContentForm" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="type" value="blogs" />
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Blogs Banner Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Blogs Banner <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="blogs_banner_image" id="blogs_banner_image">
                    <div class="card">
                      <input type="hidden" name="blogs_banner_image_old" id="blogs_banner_image_old" value="{{ $blogspagecontent['blogs_banner_image']['value'] ?? '' }}">
                      <img src="/assets/blog/{{$blogspagecontent['blogs_banner_image']['value'] ?? '' }}" alt="Blogs Image" class="card-img-top img-fluid">
                    </div> @error('blogs_banner_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label>Blogs Title <span style="color: red;">*</span>
                  </label>
                  <input type="text" class="form-control" name="blogs_section_title" id="blogs_section_title" value="{{ $blogspagecontent['blogs_section_title']['value'] ?? '' }}"> @error('blogs_section_title') <div class="error">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                  <label>Blogs Content <span style="color: red;">*</span>
                  </label>
                  <input type="text" class="form-control" name="blogs_section_content" id="blogs_section_content" value="{{ $blogspagecontent['blogs_section_content']['value'] ?? '' }}"> @error('blogs_section_content') <div class="error">{{ $message }}</div> @enderror
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-footer">
          <input type="submit" class="btn btn-primary" name="save_and_preview" value="Save & Preview">
          <input type="submit" class="btn btn-primary" name="save_and_publish" value="Save & Publish">
        </div>
      </div>
    </div>
</div>
</div>
</div>
</div>
</form>
</div>
</section>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  });
</script> @endsection