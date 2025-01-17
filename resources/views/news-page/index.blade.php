@extends('layout.admin') @section('page-content') <div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>News Page</h1>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('news_page.save') }}" method="post" id="NewsPageContentForm" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="type" value="news" />
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">News Section Banner</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Banner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="news_banner_video" id="news_banner_video" value="{{ $newspagecontent['news_banner_video']['value'] ?? '' }}"> @error('news_banner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="news_banner_video_old" id="news_banner_video_old" value="{{ $newspagecontent['news_banner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $newspagecontent['news_banner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Mobile Banner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="news_mobile_banner_video" id="news_mobile_banner_video"> @error('news_mobile_banner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="news_mobile_banner_video_old" id="news_mobile_banner_video_old" value="{{ $newspagecontent['news_mobile_banner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $newspagecontent['news_mobile_banner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  
                </div>
                  <div class="form-group row">
                  <div class="col-md-6">
                    <label>Banner Video Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="news_banner_video_title" id="news_banner_video_title" value="{{ $newspagecontent['news_banner_video_title']['value'] ?? '' }}"> @error('news_banner_video_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                
                  <div class="col-md-6">
                    <label>Banner Video Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="news_banner_video_sub_title" id="news_banner_video_sub_title" value="{{ $newspagecontent['news_banner_video_sub_title']['value'] ?? '' }}"> @error('news_banner_video_sub_title') <div class="error">{{ $message }}</div> @enderror
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