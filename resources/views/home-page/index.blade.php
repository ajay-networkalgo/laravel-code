@extends('layout.admin') @section('page-content') <div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Home Page</h1>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('home_page.save') }}" method="post" id="HomePageContentForm" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="type" value="home" />
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Home Banner</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Banner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="home_banner_video" id="home_banner_video" value="{{ $homepagecontent['home_banner_video']['value'] ?? '' }}"> @error('home_banner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="home_banner_video_old" id="home_banner_video_old" value="{{ $homepagecontent['home_banner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $homepagecontent['home_banner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Mobile Banner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="home_mobile_banner_video" id="home_mobile_banner_video"> @error('home_mobile_banner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="home_mobile_banner_video_old" id="home_mobile_banner_video_old" value="{{ $homepagecontent['home_mobile_banner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $homepagecontent['home_mobile_banner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label>Banner Video Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="home_banner_video_title" id="home_banner_video_title" value="{{ $homepagecontent['home_banner_video_title']['value'] ?? '' }}"> @error('home_banner_video_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Banner Video Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="home_banner_video_sub_title" id="home_banner_video_sub_title" value="{{ $homepagecontent['home_banner_video_sub_title']['value'] ?? '' }}"> @error('home_banner_video_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Home Powering</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Powering Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="home_powering_title" id="home_powering_title" value="{{ $homepagecontent['home_powering_title']['value'] ?? '' }}"> @error('home_powering_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Powering Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="home_powering_sub_title" id="home_powering_sub_title" value="{{ $homepagecontent['home_powering_sub_title']['value'] ?? '' }}"> @error('home_powering_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Home Owner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="home_owner_video" id="home_owner_video"> @error('home_owner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="home_owner_video_old" id="home_owner_video_old" value="{{ $homepagecontent['home_owner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $homepagecontent['home_owner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Home Installers Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="home_installers_video" id="home_installers_video"> @error('home_installers_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="home_installers_video_old" id="home_installers_video_old" value="{{ $homepagecontent['home_installers_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $homepagecontent['home_installers_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Storms Happen</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Storms Happen Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="home_storm_happen_title" id="home_storm_happen_title" value="{{ $homepagecontent['home_storm_happen_title']['value'] ?? '' }}"> @error('home_storm_happen_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Storms Happen Banner <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="home_storm_happen_banner" id="home_storm_happen_banner"> @error('home_storm_happen_banner') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="home_storm_happen_banner_old" id="home_storm_happen_banner_old" value="{{ $homepagecontent['home_storm_happen_banner']['value'] ?? '' }}">
                      <img src="/assets/{{$homepagecontent['home_storm_happen_banner']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Storms Happen Content <span style="color: red;">*</span>
                    </label>
                    <textarea name="home_storm_happen_content" id="home_storm_happen_content" class="form-control">{!! $homepagecontent['home_storm_happen_content']['value'] ?? '' !!}</textarea>
                     @error('home_storm_happen_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Olax Smart</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Olax Smart Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="home_Olax_smart_title" id="home_Olax_smart_title" value="{{ $homepagecontent['home_Olax_smart_title']['value'] ?? '' }}"> @error('home_Olax_smart_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Olax Smart Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="home_Olax_smart_sub_title" id="home_Olax_smart_sub_title" value="{{ $homepagecontent['home_Olax_smart_sub_title']['value'] ?? '' }}"> @error('home_Olax_smart_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Olax Smart Content <span style="color: red;">*</span>
                    </label>
                    <textarea name="home_Olax_smart_content" id="home_Olax_smart_content" class="form-control">{!! $homepagecontent['home_Olax_smart_content']['value'] ?? '' !!}</textarea>
                     @error('home_Olax_smart_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Olax Smart Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="home_Olax_smart_video" id="home_Olax_smart_video"> @error('home_Olax_smart_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="home_Olax_smart_video_old" id="home_Olax_smart_video_old" value="{{ $homepagecontent['home_Olax_smart_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $homepagecontent['home_Olax_smart_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Leading The Way</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Leading the Way Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="home_leading_the_way_title" id="home_leading_the_way_title" value="{{ $homepagecontent['home_leading_the_way_title']['value'] ?? '' }}"> @error('home_leading_the_way_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Leading the Way Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="home_leading_the_way_sub_title" id="home_leading_the_way_sub_title" value="{{ $homepagecontent['home_leading_the_way_sub_title']['value'] ?? '' }}"> @error('home_leading_the_way_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Leading Slide One Image <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="home_leading_slide_one_image" id="home_leading_slide_one_image">
                    <div class="card">
                      <input type="hidden" name="home_leading_slide_one_image_old" id="home_leading_slide_one_image_old" value="{{ $homepagecontent['home_leading_slide_one_image']['value'] ?? '' }}">
                      <img src="/assets/{{$homepagecontent['home_leading_slide_one_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('home_leading_slide_one_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
</div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label>Leading Slide One Description <span style="color: red;">*</span>
                      </label>
                      <textarea id="home_leading_slide_one_description" name="home_leading_slide_one_description">{{ $homepagecontent['home_leading_slide_one_description']['value'] ?? '' }}</textarea> @error('home_leading_slide_one_description') <div class="error">{{ $message }}</div> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label>Leading Slide Two Image <span style="color: red;">*</span>
                      </label>
                      <input type="file" class="form-control" name="home_leading_slide_two_image" id="home_leading_slide_two_image"> @error('home_leading_slide_two_image') <div class="error">{{ $message }}</div> @enderror <div class="card">
                        <input type="hidden" name="home_leading_slide_two_image_old" id="home_leading_slide_two_image_old" value="{{ $homepagecontent['home_leading_slide_two_image']['value'] ?? '' }}">
                        <img src="/assets/{{$homepagecontent['home_leading_slide_two_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                      </div>
                    </div>
</div>
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label>Leading Slide Two Description <span style="color: red;">*</span>
                        </label>
                        <textarea id="home_leading_slide_two_description" name="home_leading_slide_two_description">{{ $homepagecontent['home_leading_slide_two_description']['value'] ?? '' }}</textarea> @error('home_leading_slide_two_description') <div class="error">{{ $message }}</div> @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label>Leading Slider Three Image <span style="color: red;">*</span>
                        </label>
                        <input type="file" class="form-control" name="home_leading_slide_three_image" id="home_leading_slide_three_image"> @error('home_leading_slide_three_image') <div class="error">{{ $message }}</div> @enderror <div class="card">
                          <input type="hidden" name="home_leading_slide_three_image_old" id="home_leading_slide_three_image_old" value="{{ $homepagecontent['home_leading_slide_three_image']['value'] ?? '' }}">
                          <img src="/assets/{{$homepagecontent['home_leading_slide_three_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label>Leading Slide Three Description <span style="color: red;">*</span>
                        </label>
                        <textarea id="home_leading_slide_three_description" name="home_leading_slide_three_description">{{ $homepagecontent['home_leading_slide_three_description']['value'] ?? '' }}</textarea> @error('home_leading_slide_three_description') <div class="error">{{ $message }}</div> @enderror
                      </div>
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
    // Summernote
    $('#home_leading_slide_one_description').summernote({
      height: 300 // Set the height here
    });
    $("#home_leading_slide_two_description").summernote({
      height: 300 // Set the height here
    });
    $("#home_leading_slide_three_description").summernote({
      height: 300 // Set the height here
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