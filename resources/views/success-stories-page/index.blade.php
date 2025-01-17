@extends('layout.admin') @section('page-content') <div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Success Stories Page</h1>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('success_stories_page.save') }}" method="post" id="SuccessStoriesPageContentForm" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="type" value="success_stories" />
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Success Stories Banner Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Banner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="success_stories_banner_video" id="success_stories_banner_video" value="{{ $successstoriespagecontent['success_stories_banner_video']['value'] ?? '' }}"> @error('success_stories_banner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="success_stories_banner_video_old" id="success_stories_banner_video_old" value="{{ $successstoriespagecontent['success_stories_banner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $successstoriespagecontent['success_stories_banner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Mobile Banner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="success_stories_mobile_banner_video" id="success_stories_mobile_banner_video"> @error('success_stories_mobile_banner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="success_stories_mobile_banner_video_old" id="success_stories_mobile_banner_video_old" value="{{ $successstoriespagecontent['success_stories_mobile_banner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $successstoriespagecontent['success_stories_mobile_banner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  
                </div>
                  <div class="form-group row">
                  <div class="col-md-6">
                    <label>Banner Video Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="success_stories_banner_video_title" id="success_stories_banner_video_title" value="{{ $successstoriespagecontent['success_stories_banner_video_title']['value'] ?? '' }}"> @error('success_stories_banner_video_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                
                  <div class="col-md-6">
                    <label>Banner Video Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="success_stories_banner_video_sub_title" id="success_stories_banner_video_sub_title" value="{{ $successstoriespagecontent['success_stories_banner_video_sub_title']['value'] ?? '' }}"> @error('success_stories_banner_video_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Success Stories Testimonial Section</h3>
              </div>
              <div class="card-body">
                  <div class="form-group row">
                  <div class="col-md-6">
                    <label>Success Stories Testimonial Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="success_stories_testimonial_title" id="success_stories_testimonial_title" value="{{ $successstoriespagecontent['success_stories_testimonial_title']['value'] ?? '' }}"> @error('success_stories_banner_video_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                
                  <div class="col-md-6">
                    <label>Success Stories Testimonial Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="success_stories_testimonial_sub_title" id="success_stories_testimonial_sub_title" value="{{ $successstoriespagecontent['success_stories_testimonial_sub_title']['value'] ?? '' }}"> @error('success_stories_testimonial_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Success Stories Testimonial One</h3>
              </div>
              <div class="card-body">
                  <div class="form-group row">
                  <div class="col-md-12">
                    <label>client name <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="success_stories_testimonial_one_client_name" id="success_stories_testimonial_one_client_name" value="{{ $successstoriespagecontent['success_stories_testimonial_one_client_name']['value'] ?? '' }}"> @error('success_stories_testimonial_one_client_name') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  
                </div>

                <div class="form-group row">
                <div class="col-md-6">
                    <label> Content <span style="color: red;">*</span>
                    </label>
                    <textarea class="form-control" name="success_stories_testimonial_one_content" id="success_stories_testimonial_one_content" rows="7">{{ $successstoriespagecontent['success_stories_testimonial_one_content']['value'] ?? '' }}</textarea>
                    @error('success_stories_testimonial_one_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                <div class="col-md-6">
                    <label>client profile/logo <span style="color: red;">*</span>
                    </label>
                    
                    <input type="file" class="form-control" name="success_stories_testimonial_one_client_profile" id="success_stories_testimonial_one_client_profile">
                    <div class="card">
                      <input type="hidden" name="success_stories_testimonial_one_client_profile_old" id="success_stories_testimonial_one_client_profile_old" value="{{ $successstoriespagecontent['success_stories_testimonial_one_client_profile']['value'] ?? '' }}">
                      <img src="/assets/{{ $successstoriespagecontent['success_stories_testimonial_one_client_profile']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('success_stories_testimonial_one_client_profile') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                </div>

              </div>
            </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Success Stories Testimonial Two</h3>
              </div>
              <div class="card-body">
                  <div class="form-group row">
                  <div class="col-md-12">
                    <label>client name <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="success_stories_testimonial_two_client_name" id="success_stories_testimonial_two_client_name" value="{{ $successstoriespagecontent['success_stories_testimonial_two_client_name']['value'] ?? '' }}"> @error('success_stories_testimonial_two_client_name') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  
                </div>

                <div class="form-group row">
                <div class="col-md-6">
                    <label> Content <span style="color: red;">*</span>
                    </label>
                    <textarea class="form-control" name="success_stories_testimonial_two_content" id="success_stories_testimonial_two_content" rows="7">{{ $successstoriespagecontent['success_stories_testimonial_two_content']['value'] ?? '' }}</textarea>
                    @error('success_stories_testimonial_two_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                <div class="col-md-6">
                    <label>client profile/logo <span style="color: red;">*</span>
                    </label>
                    
                    <input type="file" class="form-control" name="success_stories_testimonial_two_client_profile" id="success_stories_testimonial_two_client_profile">
                    <div class="card">
                      <input type="hidden" name="success_stories_testimonial_two_client_profile_old" id="success_stories_testimonial_two_client_profile_old" value="{{ $successstoriespagecontent['success_stories_testimonial_two_client_profile']['value'] ?? '' }}">
                      <img src="/assets/{{ $successstoriespagecontent['success_stories_testimonial_two_client_profile']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('success_stories_testimonial_two_client_profile') <div class="error">{{ $message }}</div> @enderror
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