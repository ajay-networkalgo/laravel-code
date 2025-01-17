@extends('layout.admin') @section('page-content') <div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product Page</h1>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('product_page.save') }}" method="post" id="ProductPageContentForm" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="type" value="product" />
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Section Banner</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Banner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="product_banner_video" id="product_banner_video" value="{{ $productpagecontent['product_banner_video']['value'] ?? '' }}"> @error('product_banner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="product_banner_video_old" id="product_banner_video_old" value="{{ $productpagecontent['product_banner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $productpagecontent['product_banner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Mobile Banner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="product_mobile_banner_video" id="product_mobile_banner_video"> @error('product_mobile_banner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="product_mobile_banner_video_old" id="product_mobile_banner_video_old" value="{{ $productpagecontent['product_mobile_banner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $productpagecontent['product_mobile_banner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  
                </div>
                  <div class="form-group row">
                  <div class="col-md-6">
                    <label>Banner Video Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_banner_video_title" id="product_banner_video_title" value="{{ $productpagecontent['product_banner_video_title']['value'] ?? '' }}"> @error('product_banner_video_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                
                  <div class="col-md-6">
                    <label>Banner Video Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_banner_video_sub_title" id="product_banner_video_sub_title" value="{{ $productpagecontent['product_banner_video_sub_title']['value'] ?? '' }}"> @error('product_banner_video_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Products Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Products Section Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_section_title" id="product_section_title" value="{{ $productpagecontent['product_section_title']['value'] ?? '' }}"> @error('product_section_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                
                  <div class="col-md-6">
                    <label>Products Section Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_section_sub_title" id="product_section_sub_title" value="{{ $productpagecontent['product_section_sub_title']['value'] ?? '' }}"> @error('product_section_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product one</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product one Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_one_title" id="product_one_title" value="{{ $productpagecontent['product_one_title']['value'] ?? '' }}"> @error('product_one_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product one content <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_one_content" id="product_one_content" value="{{ $productpagecontent['product_one_content']['value'] ?? '' }}"> @error('product_one_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product one slug <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_one_slug" id="product_one_slug" value="{{ $productpagecontent['product_one_slug']['value'] ?? '' }}"> @error('product_one_slug') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product One Image<span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="product_one_image" id="product_one_image">
                    <div class="card">
                      <input type="hidden" name="product_one_image_old" id="product_one_image_old" value="{{ $productpagecontent['product_one_image']['value'] ?? '' }}">
                      <img src="/assets/product/{{$productpagecontent['product_one_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('product_one_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
            </div>
          </div>
        </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product two</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product two Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_two_title" id="product_two_title" value="{{ $productpagecontent['product_two_title']['value'] ?? '' }}"> @error('product_two_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product two content <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_two_content" id="product_two_content" value="{{ $productpagecontent['product_two_content']['value'] ?? '' }}"> @error('product_two_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product two slug <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_two_slug" id="product_two_slug" value="{{ $productpagecontent['product_two_slug']['value'] ?? '' }}"> @error('product_two_slug') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product two Image<span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="product_two_image" id="product_two_image">
                    <div class="card">
                      <input type="hidden" name="product_two_image_old" id="product_two_image_old" value="{{ $productpagecontent['product_two_image']['value'] ?? '' }}">
                      <img src="/assets/product/{{$productpagecontent['product_two_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('product_two_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
              </div>

            </div>
          </div>
      </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product three</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product three Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_three_title" id="product_three_title" value="{{ $productpagecontent['product_three_title']['value'] ?? '' }}"> @error('product_three_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product three content <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_three_content" id="product_three_content" value="{{ $productpagecontent['product_three_content']['value'] ?? '' }}"> @error('product_three_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product three slug <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_three_slug" id="product_three_slug" value="{{ $productpagecontent['product_three_slug']['value'] ?? '' }}"> @error('product_three_slug') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product three Image<span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="product_three_image" id="product_three_image">
                    <div class="card">
                      <input type="hidden" name="product_three_image_old" id="product_three_image_old" value="{{ $productpagecontent['product_three_image']['value'] ?? '' }}">
                      <img src="/assets/product/{{$productpagecontent['product_three_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('product_three_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
              </div>
            </div>
          </div>
        </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product four</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product four Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_four_title" id="product_four_title" value="{{ $productpagecontent['product_four_title']['value'] ?? '' }}"> @error('product_four_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product four content <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_four_content" id="product_four_content" value="{{ $productpagecontent['product_four_content']['value'] ?? '' }}"> @error('product_four_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product four slug <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_four_slug" id="product_four_slug" value="{{ $productpagecontent['product_four_slug']['value'] ?? '' }}"> @error('product_four_slug') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Product four Image<span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="product_four_image" id="product_four_image">
                    <div class="card">
                      <input type="hidden" name="product_four_image_old" id="product_four_image_old" value="{{ $productpagecontent['product_four_image']['value'] ?? '' }}">
                      <img src="/assets/product/{{$productpagecontent['product_four_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('product_four_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
              </div>
            </div>
          </div>
        </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Features Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Features Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_feature_title" id="product_feature_title" value="{{ $productpagecontent['product_feature_title']['value'] ?? '' }}"> @error('product_feature_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Features Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_feature_sub_title" id="product_feature_sub_title" value="{{ $productpagecontent['product_feature_sub_title']['value'] ?? '' }}"> @error('product_feature_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Features Image <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="product_feature_image" id="product_feature_image">
                    <div class="card">
                      <input type="hidden" name="product_feature_image_old" id="product_feature_image_old" value="{{ $productpagecontent['product_feature_image']['value'] ?? '' }}">
                      <img src="/assets/product/{{ $productpagecontent['product_feature_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('product_feature_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Feature one</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature one Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="feature_one_title" id="feature_one_title" value="{{ $productpagecontent['feature_one_title']['value'] ?? '' }}"> @error('feature_one_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature one content <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="feature_one_content" id="feature_one_content" value="{{ $productpagecontent['feature_one_content']['value'] ?? '' }}"> @error('feature_one_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature one Image<span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="feature_one_image" id="feature_one_image">
                    <div class="card">
                      <input type="hidden" name="feature_one_image_old" id="feature_one_image_old" value="{{ $productpagecontent['feature_one_image']['value'] ?? '' }}">
                      <img src="/assets/product/{{$productpagecontent['feature_one_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('feature_one_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
              </div>
            </div>
          </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Feature two</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature two Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="feature_two_title" id="feature_two_title" value="{{ $productpagecontent['feature_two_title']['value'] ?? '' }}"> @error('feature_two_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature two content <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="feature_two_content" id="feature_two_content" value="{{ $productpagecontent['feature_two_content']['value'] ?? '' }}"> @error('feature_two_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature two Image<span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="feature_two_image" id="feature_two_image">
                    <div class="card">
                      <input type="hidden" name="feature_two_image_old" id="feature_two_image_old" value="{{ $productpagecontent['feature_two_image']['value'] ?? '' }}">
                      <img src="/assets/product/{{$productpagecontent['feature_two_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('feature_two_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
              </div>
            </div>
          </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Feature three</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature three Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="feature_three_title" id="feature_three_title" value="{{ $productpagecontent['feature_three_title']['value'] ?? '' }}"> @error('feature_three_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature three content <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="feature_three_content" id="feature_three_content" value="{{ $productpagecontent['feature_three_content']['value'] ?? '' }}"> @error('feature_three_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature three Image<span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="feature_three_image" id="feature_three_image">
                    <div class="card">
                      <input type="hidden" name="feature_three_image_old" id="feature_three_image_old" value="{{ $productpagecontent['feature_three_image']['value'] ?? '' }}">
                      <img src="/assets/product/{{$productpagecontent['feature_three_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('feature_three_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
              </div>
            </div>
          </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Feature four</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature four Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="feature_four_title" id="feature_four_title" value="{{ $productpagecontent['feature_four_title']['value'] ?? '' }}"> @error('feature_four_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature four content <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="feature_four_content" id="feature_four_content" value="{{ $productpagecontent['feature_four_content']['value'] ?? '' }}"> @error('feature_four_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature four Image<span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="feature_four_image" id="feature_four_image">
                    <div class="card">
                      <input type="hidden" name="feature_four_image_old" id="feature_four_image_old" value="{{ $productpagecontent['feature_four_image']['value'] ?? '' }}">
                      <img src="/assets/product/{{$productpagecontent['feature_four_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('feature_four_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
              </div>
            </div>
          </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Feature five</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature five Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="feature_five_title" id="feature_five_title" value="{{ $productpagecontent['feature_five_title']['value'] ?? '' }}"> @error('feature_five_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature five content <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="feature_five_content" id="feature_five_content" value="{{ $productpagecontent['feature_five_content']['value'] ?? '' }}"> @error('feature_five_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature five Image<span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="feature_five_image" id="feature_five_image">
                    <div class="card">
                      <input type="hidden" name="feature_five_image_old" id="feature_five_image_old" value="{{ $productpagecontent['feature_five_image']['value'] ?? '' }}">
                      <img src="/assets/product/{{$productpagecontent['feature_five_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('feature_five_image') <div class="error">{{ $message }}</div> @enderror
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
      </form>
    </div>
  </section>
</div>
<script>
  $(function() {
    // Summernote
    $('#product_benefits_description').summernote({
      height: 300 // Set the height here
    });
    $("#product_batteries_features_description").summernote({
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