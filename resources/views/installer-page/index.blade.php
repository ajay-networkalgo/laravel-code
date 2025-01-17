@extends('layout.admin') @section('page-content') <div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Installer Page</h1>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('installer_page.save') }}" method="post" id="InstallerPageContentForm" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="type" value="installer" />
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Installer Banner</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Banner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="installer_banner_video" id="installer_banner_video" value="{{ $installerpagecontent['installer_banner_video']['value'] ?? '' }}"> @error('installer_banner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="installer_banner_video_old" id="installer_banner_video_old" value="{{ $installerpagecontent['installer_banner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $installerpagecontent['installer_banner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Mobile Banner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="installer_mobile_banner_video" id="installer_mobile_banner_video"> @error('installer_mobile_banner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="installer_mobile_banner_video_old" id="installer_mobile_banner_video_old" value="{{ $installerpagecontent['installer_mobile_banner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $installerpagecontent['installer_mobile_banner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label>Banner Video Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="installer_banner_video_title" id="installer_banner_video_title" value="{{ $installerpagecontent['installer_banner_video_title']['value'] ?? '' }}"> @error('installer_banner_video_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Banner Video Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="installer_banner_video_sub_title" id="installer_banner_video_sub_title" value="{{ $installerpagecontent['installer_banner_video_sub_title']['value'] ?? '' }}"> @error('installer_banner_video_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Learn More About</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Learn More Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="installer_learn_more_title" id="installer_learn_more_title" value="{{ $installerpagecontent['installer_learn_more_title']['value'] ?? '' }}"> @error('installer_learn_more_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Learn More Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="installer_learn_more_sub_title" id="installer_learn_more_sub_title" value="{{ $installerpagecontent['installer_learn_more_sub_title']['value'] ?? '' }}"> @error('installer_learn_more_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Learn More Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="installer_learn_more_video" id="installer_learn_more_video"> @error('installer_learn_more_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="installer_learn_more_video_old" id="installer_learn_more_video_old" value="{{ $installerpagecontent['installer_learn_more_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $installerpagecontent['installer_learn_more_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label>Learn More Content <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="installer_learn_more_content" id="installer_learn_more_content" value="{{ $installerpagecontent['installer_learn_more_content']['value'] ?? '' }}"> @error('installer_learn_more_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Benefits of Partnering</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Benefits Image <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="installer_benefits_image" id="installer_benefits_image">
                    <div class="card">
                      <input type="hidden" name="installer_benefits_image_old" id="installer_benefits_image_old" value="{{ $installerpagecontent['installer_benefits_image']['value'] ?? '' }}">
                      <img src="/assets/installer/{{$installerpagecontent['installer_benefits_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('installer_benefits_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Benefits Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="installer_benefits_title" id="installer_benefits_title" value="{{ $installerpagecontent['installer_benefits_title']['value'] ?? '' }}"> @error('installer_benefits_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Benefits Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="installer_benefits_sub_title" id="installer_benefits_sub_title" value="{{ $installerpagecontent['installer_benefits_sub_title']['value'] ?? '' }}"> @error('installer_benefits_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Benefits Description <span style="color: red;">*</span>
                    </label>
                    <textarea id="installer_benefits_description" name="installer_benefits_description">{{ $installerpagecontent['installer_benefits_description']['value'] ?? '' }}</textarea> @error('installer_benefits_description') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Batteries Features Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Batteries Features Banner <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="installer_batteries_features_banner" id="installer_batteries_features_banner">
                    <div class="card">
                      <input type="hidden" name="installer_batteries_features_banner_old" id="installer_batteries_features_banner_old" value="{{ $installerpagecontent['installer_batteries_features_banner']['value'] ?? '' }}">
                      <img src="/assets/installer/{{ $installerpagecontent['installer_batteries_features_banner']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('installer_batteries_features_banner') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Batteries Features Description <span style="color: red;">*</span>
                    </label>
                    <textarea id="installer_batteries_features_description" name="installer_batteries_features_description">{{ $installerpagecontent['installer_batteries_features_description']['value'] ?? '' }}</textarea> @error('installer_batteries_features_description') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Become a Certified Installer</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Become a Certified Installer Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="installer_become_a_certified_title" id="installer_become_a_certified_title" value="{{ $installerpagecontent['installer_become_a_certified_title']['value'] ?? '' }}"> @error('installer_become_a_certified_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Become a Certified Installer Image <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="installer_become_a_certified_image" id="installer_become_a_certified_image">
                    <div class="card">
                      <input type="hidden" name="installer_become_a_certified_image_old" id="installer_become_a_certified_image_old" value="{{ $installerpagecontent['installer_become_a_certified_image']['value'] ?? '' }}">
                      <img src="/assets/installer/{{ $installerpagecontent['installer_become_a_certified_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('installer_become_a_certified_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <input type="submit" class="btn btn-primary" name="save_and_preview" value="Save & Preview">
                <input type="submit" class="btn btn-primary" name="save_and_publish" value="Save & Publish">
              </div>
            </div>
      </form>
    </div>
  </section>
</div>
<script>
  $(function() {
    $('#installer_benefits_description').summernote({
      height: 300
    });
    $("#installer_batteries_features_description").summernote({
      height: 300 
    });
  });
</script>
<script>
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
  });
  
</script>
@endsection