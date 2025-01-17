@extends('layout.admin') @section('page-content') <div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Home Owner Page</h1>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('homeowner_page.save') }}" method="post" id="HomeOwnerPageContentForm" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="type" value="homeowner" />
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">homeowner Banner</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Banner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="homeowner_banner_video" id="homeowner_banner_video" value="{{ $homeownerpagecontent['homeowner_banner_video']['value'] ?? '' }}"> @error('homeowner_banner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="homeowner_banner_video_old" id="homeowner_banner_video_old" value="{{ $homeownerpagecontent['homeowner_banner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $homeownerpagecontent['homeowner_banner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Mobile Banner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="homeowner_mobile_banner_video" id="homeowner_mobile_banner_video"> @error('homeowner_mobile_banner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="homeowner_mobile_banner_video_old" id="homeowner_mobile_banner_video_old" value="{{ $homeownerpagecontent['homeowner_mobile_banner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $homeownerpagecontent['homeowner_mobile_banner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label>Banner Video Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="homeowner_banner_video_title" id="homeowner_banner_video_title" value="{{ $homeownerpagecontent['homeowner_banner_video_title']['value'] ?? '' }}"> @error('homeowner_banner_video_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Banner Video Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="homeowner_banner_video_sub_title" id="homeowner_banner_video_sub_title" value="{{ $homeownerpagecontent['homeowner_banner_video_sub_title']['value'] ?? '' }}"> @error('homeowner_banner_video_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Discover The XPower</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Discover The XPower Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="homeowner_xpower_title" id="homeowner_xpower_title" value="{{ $homeownerpagecontent['homeowner_xpower_title']['value'] ?? '' }}"> @error('homeowner_xpower_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Discover the XPowe Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="homeowner_discover_the_xpower_video" id="homeowner_discover_the_xpower_video"> @error('homeowner_discover_the_xpower_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="homeowner_discover_the_xpower_video_old" id="homeowner_learn_more_video_old" value="{{ $homeownerpagecontent['homeowner_discover_the_xpower_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $homeownerpagecontent['homeowner_discover_the_xpower_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Olax App Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Olax App Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="homeowner_Olax_app_title" id="homeowner_Olax_app_title" value="{{ $homeownerpagecontent['homeowner_Olax_app_title']['value'] ?? '' }}"> @error('homeowner_Olax_app_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Olax App Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="homeowner_Olax_app_sub_title" id="homeowner_Olax_app_sub_title" value="{{ $homeownerpagecontent['homeowner_Olax_app_sub_title']['value'] ?? '' }}"> @error('homeowner_Olax_app_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Olax App Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="homeowner_Olax_app_video" id="homeowner_Olax_app_video"> @error('homeowner_Olax_app_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="homeowner_Olax_app_video_old" id="homeowner_Olax_app_video_old" value="{{ $homeownerpagecontent['homeowner_Olax_app_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $homeownerpagecontent['homeowner_Olax_app_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Configure XPower Solution</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Configure XPower Banner <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="homeowner_configure_xpower_image" id="homeowner_configure_xpower_image">
                    <div class="card">
                      <input type="hidden" name="homeowner_configure_xpower_image_old" id="homeowner_configure_xpower_image_old" value="{{ $homeownerpagecontent['homeowner_configure_xpower_image']['value'] ?? '' }}">
                      <img src="/assets/homeowner/{{$homeownerpagecontent['homeowner_configure_xpower_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('homeowner_configure_xpower_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Configure XPower Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="homeowner_configure_xpower_title" id="homeowner_configure_xpower_title" value="{{ $homeownerpagecontent['homeowner_configure_xpower_title']['value'] ?? '' }}"> @error('homeowner_benefits_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Configure XPower Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="homeowner_configure_xpower_sub_title" id="homeowner_configure_xpower_sub_title" value="{{ $homeownerpagecontent['homeowner_configure_xpower_sub_title']['value'] ?? '' }}"> @error('homeowner_configure_xpower_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Configure XPower Description <span style="color: red;">*</span>
                    </label>
                    <textarea id="homeowner_configure_xpower_description" name="homeowner_configure_xpower_description">{{ $homeownerpagecontent['homeowner_configure_xpower_description']['value'] ?? '' }}</textarea> @error('homeowner_benefits_description') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Looking to offsets Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Looking to offsets Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="homeowner_looking_to_offset_title" id="homeowner_looking_to_offset_title" value="{{ $homeownerpagecontent['homeowner_looking_to_offset_title']['value'] ?? '' }}"> @error('homeowner_looking_to_offset_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Looking to offsets Content <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="homeowner_looking_to_offset_content" id="homeowner_looking_to_offset_content" value="{{ $homeownerpagecontent['homeowner_looking_to_offset_content']['value'] ?? '' }}"> @error('homeowner_looking_to_offset_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Looking to offsets Image <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="homeowner_looking_to_offset_image" id="homeowner_looking_to_offset_image">
                    <div class="card">
                      <input type="hidden" name="homeowner_looking_to_offset_image_old" id="homeowner_looking_to_offset_image_old" value="{{ $homeownerpagecontent['homeowner_looking_to_offset_image']['value'] ?? '' }}">
                      <img src="/assets/homeowner/{{ $homeownerpagecontent['homeowner_looking_to_offset_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('homeowner_looking_to_offset_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">States with Height Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>States with Height Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="homeowner_states_with_height_title" id="homeowner_states_with_height_title" value="{{ $homeownerpagecontent['homeowner_states_with_height_title']['value'] ?? '' }}"> @error('homeowner_states_with_height_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-12">
                    <label>States with Height Image <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="homeowner_states_with_height_image" id="homeowner_states_with_height_image">
                    <div class="card">
                      <input type="hidden" name="homeowner_states_with_height_image_old" id="homeowner_states_with_height_image_old" value="{{ $homeownerpagecontent['homeowner_states_with_height_image']['value'] ?? '' }}">
                      <img src="/assets/homeowner/{{ $homeownerpagecontent['homeowner_states_with_height_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('homeowner_states_with_height_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">States of Concern Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>States of Concern Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="homeowner_states_of_concern_title" id="homeowner_states_of_concern_title" value="{{ $homeownerpagecontent['homeowner_states_of_concern_title']['value'] ?? '' }}"> @error('homeowner_states_of_concern_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-12">
                    <label>States of Concern Content <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="homeowner_states_of_concern_content" id="homeowner_states_of_concern_content" value="{{ $homeownerpagecontent['homeowner_states_of_concern_content']['value'] ?? '' }}"> @error('homeowner_states_of_concern_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-12">
                    <label>States of Concern Image <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="homeowner_states_of_concern_image" id="homeowner_states_of_concern_image">
                    <div class="card">
                      <input type="hidden" name="homeowner_states_of_concern_image_old" id="homeowner_states_of_concern_image_old" value="{{ $homeownerpagecontent['homeowner_states_of_concern_image']['value'] ?? '' }}">
                      <img src="/assets/homeowner/{{ $homeownerpagecontent['homeowner_states_of_concern_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('homeowner_states_of_concern_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ready to see Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Ready to see Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="homeowner_ready_to_see_title" id="homeowner_ready_to_see_title" value="{{ $homeownerpagecontent['homeowner_ready_to_see_title']['value'] ?? '' }}"> @error('homeowner_ready_to_see_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Ready to see Content <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="homeowner_ready_to_see_content" id="homeowner_ready_to_see_content" value="{{ $homeownerpagecontent['homeowner_ready_to_see_content']['value'] ?? '' }}"> @error('homeowner_ready_to_see_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-primary">
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
    // Summernote
    $('#homeowner_configure_xpower_description').summernote({
      height: 100 // Set the height here
    });
    $('#reservationdate').datetimepicker({
      format: 'L'
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  });
</script> @endsection