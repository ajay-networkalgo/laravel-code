@extends('layout.admin') @section('page-content') <div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>About Page</h1>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('about_page.save') }}" method="post" id="AboutPageContentForm" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="type" value="about" />
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Section Banner</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Banner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="about_banner_video" id="about_banner_video" value="{{ $aboutpagecontent['about_banner_video']['value'] ?? '' }}"> @error('about_banner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="about_banner_video_old" id="about_banner_video_old" value="{{ $aboutpagecontent['about_banner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $aboutpagecontent['about_banner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Mobile Banner Video <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="about_mobile_banner_video" id="about_mobile_banner_video"> @error('about_mobile_banner_video') <div class="error">{{ $message }}</div> @enderror <div class="card">
                      <input type="hidden" name="about_mobile_banner_video_old" id="about_mobile_banner_video_old" value="{{ $aboutpagecontent['about_mobile_banner_video']['value'] ?? '' }}">
                      <video class="card-img-top img-fluid" controls>
                        <source src="/assets/videos/compressed/{{ $aboutpagecontent['about_mobile_banner_video']['value'] ?? '' }}" type="video/mp4">
                      </video>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Banner Video Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="about_banner_video_title" id="about_banner_video_title" value="{{ $aboutpagecontent['about_banner_video_title']['value'] ?? '' }}"> @error('about_banner_video_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Who We Are Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Who We Are Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="about_who_we_are_title" id="about_who_we_are_title" value="{{ $aboutpagecontent['about_who_we_are_title']['value'] ?? '' }}"> @error('about_who_we_are_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Who We Are Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="about_who_we_are_sub_title" id="about_who_we_are_sub_title" value="{{ $aboutpagecontent['about_who_we_are_sub_title']['value'] ?? '' }}"> @error('about_who_we_are_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Who We Are Content <span style="color: red;">*</span>
                    </label>
                    <textarea name="about_who_we_are_content" id="about_who_we_are_content" class="form-control">{!! $aboutpagecontent['about_who_we_are_content']['value'] ?? '' !!}</textarea>
                     @error('about_who_we_are_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Who We Are Invention Image <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="about_who_we_are_invention_image" id="about_who_we_are_invention_image">
                    <div class="card">
                      <input type="hidden" name="about_who_we_are_invention_image_old" id="about_who_we_are_invention_image_old" value="{{ $aboutpagecontent['about_who_we_are_invention_image']['value'] ?? '' }}">
                      <img src="/assets/about_us/{{$aboutpagecontent['about_who_we_are_invention_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('about_who_we_are_invention_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Who We Are Invention Image Two <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="about_who_we_are_invention_image_two" id="about_who_we_are_invention_image_two">
                    <div class="card">
                      <input type="hidden" name="about_who_we_are_invention_image_two_old" id="about_who_we_are_invention_image_two_old" value="{{ $aboutpagecontent['about_who_we_are_invention_image_two']['value'] ?? '' }}">
                      <img src="/assets/about_us/{{$aboutpagecontent['about_who_we_are_invention_image_two']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('about_who_we_are_invention_image_two') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Our Mission Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Our Mission Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="about_mission_title" id="about_mission_title" value="{{ $aboutpagecontent['about_mission_title']['value'] ?? '' }}"> @error('about_mission_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Our Mission Content <span style="color: red;">*</span>
                    </label>
                    <textarea name="about_mission_content" id="about_mission_content" class="form-control">{!! $aboutpagecontent['about_mission_content']['value'] ?? '' !!}</textarea>
                     @error('about_mission_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Our Mission Image <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="about_mission_image" id="about_mission_image">
                    <div class="card">
                      <input type="hidden" name="about_mission_image_old" id="about_mission_image_old" value="{{ $aboutpagecontent['about_mission_image']['value'] ?? '' }}">
                      <img src="/assets/about_us/{{$aboutpagecontent['about_mission_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('about_mission_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Global Reach Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Global Reach Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="about_global_reach_title" id="about_global_reach_title" value="{{ $aboutpagecontent['about_global_reach_title']['value'] ?? '' }}"> @error('about_global_reach_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Global Reach Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="about_global_reach_sub_title" id="about_global_reach_sub_title" value="{{ $aboutpagecontent['about_global_reach_sub_title']['value'] ?? '' }}"> @error('about_global_reach_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Global Reach Content <span style="color: red;">*</span>
                    </label>
                    <textarea name="about_global_reach_content" id="about_global_reach_content" class="form-control">{!! $aboutpagecontent['about_global_reach_content']['value'] ?? '' !!}</textarea>
                     @error('about_global_reach_content') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Global Reach Image <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="about_global_reach_image" id="about_global_reach_image">
                    <div class="card">
                      <input type="hidden" name="about_global_reach_image_old" id="about_global_reach_image_old" value="{{ $aboutpagecontent['about_global_reach_image']['value'] ?? '' }}">
                      <img src="/assets/about_us/{{$aboutpagecontent['about_global_reach_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('about_global_reach_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3">
                    <label>Number of Employees <span style="color: red;">*</span>
                    </label>
                    <input type="number" class="form-control" name="about_global_reach_number_of_employees" id="about_global_reach_number_of_employees" value="{{ $aboutpagecontent['about_global_reach_number_of_employees']['value'] ?? '' }}"> @error('about_global_reach_number_of_employees') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-3">
                    <label>R&D Staff <span style="color: red;">*</span>
                    </label>
                    <input type="number" class="form-control" name="about_global_reach_number_of_r_and_staff" id="about_global_reach_number_of_r_and_staff" value="{{ $aboutpagecontent['about_global_reach_number_of_r_and_staff']['value'] ?? '' }}"> @error('about_global_reach_number_of_r_and_staff') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-3">
                    <label>R&D Centers <span style="color: red;">*</span>
                    </label>
                    <input type="number" class="form-control" name="about_global_reach_number_of_r_and_d_centers" id="about_global_reach_number_of_r_and_d_centers" value="{{ $aboutpagecontent['about_global_reach_number_of_r_and_d_centers']['value'] ?? '' }}"> @error('about_global_reach_number_of_r_and_d_centers') <div class="error">{{ $message }}</div> @enderror
                  </div>
                  <div class="col-md-3">
                    <label>Global Markets <span style="color: red;">*</span>
                    </label>
                    <input type="number" class="form-control" name="about_global_reach_number_of_global_markets" id="about_global_reach_number_of_global_markets" value="{{ $aboutpagecontent['about_global_reach_number_of_global_markets']['value'] ?? '' }}"> @error('about_global_reach_number_of_global_markets') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Head Quarter and Branched Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="about_trust_global_title" id="about_trust_global_title" value="{{ $aboutpagecontent['about_trust_global_title']['value'] ?? '' }}"> @error('about_trust_global_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="about_trust_global_sub_title" id="about_trust_global_sub_title" value="{{ $aboutpagecontent['about_trust_global_sub_title']['value'] ?? '' }}"> @error('about_trust_global_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Image <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="about_trust_global_image" id="about_trust_global_image">
                    <div class="card">
                      <input type="hidden" name="about_trust_global_image_old" id="about_trust_global_image_old" value="{{ $aboutpagecontent['about_trust_global_image_old']['value'] ?? '' }}">
                      <img src="/assets/about_us/{{$aboutpagecontent['about_trust_global_image']['value'] ?? '' }}" alt="News Image" class="card-img-top img-fluid">
                    </div> @error('about_trust_global_image') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Journey Section Awards</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="about_energy_storage_title" id="about_energy_storage_title" value="{{ $aboutpagecontent['about_energy_storage_title']['value'] ?? '' }}"> @error('about_energy_storage_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="about_energy_storage_sub_title" id="about_energy_storage_sub_title" value="{{ $aboutpagecontent['about_energy_storage_sub_title']['value'] ?? '' }}"> @error('about_energy_storage_sub_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Our Recognitions Section</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Recognitions Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="about_recognitions_title" id="about_recognitions_title" value="{{ $aboutpagecontent['about_recognitions_title']['value'] ?? '' }}"> @error('about_recognitions_title') <div class="error">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Recognitions Sub Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="about_recognitions_sub_title" id="about_recognitions_sub_title" value="{{ $aboutpagecontent['about_recognitions_sub_title']['value'] ?? '' }}"> @error('about_recognitions_sub_title') <div class="error">{{ $message }}</div> @enderror
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
            </div>
</div>
            
      </form>
      <!-- Modal for Adding Award -->
      <div class="modal fade" id="addAwardModal" tabindex="-1" role="dialog" aria-labelledby="addAwardModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addAwardModalLabel">Add Award</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="{{ route('award.store') }}" method="post" id="addAwardForm">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="modal-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="award_title">Award Title <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="award_title" id="award_title">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="award_year">Award Year <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="award_year" id="award_year">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="award_logo">Award Logo <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="award_logo" id="award_logo">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Award</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Button to Open Modal -->
      
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Awards Section</h3>
          </div>
          <div class="card-body">
            
            <div class="form-group row">
              <div class="col-md-12">
        <div class="card card-primary">
          
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAwardModal"> Add Award </button>
          </div>
        </div>
      </div>
              <div class="col-md-12">
              <table class="table table-bordered" id="award-table">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Year</th>
                      <th>Logo</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
                
              
              </div>
            </div>
          </div>
        </div>
      </div>
       <!-- Modal for Adding Journey -->
 <div class="modal fade" id="addOurJourneyModal" tabindex="-1" role="dialog" aria-labelledby="addOurJourneyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addOurJourneyModalLabel">Add Journey</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="addOurJourneyForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="modal-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="Journey_description">Journey Description <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="journey_description" id="journey_description">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="Journey_year">Journey Year <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" name="journey_year" id="journey_year">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="journey_image">Journey Image <span style="color: red;">*</span>
                    </label>
                    <input type="file" class="form-control" name="journey_image" id="journey_image">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Journey</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Journeys Section</h3>
          </div>
          <div class="card-body">
            <div class="form-group row">
            <div class="col-md-12">
            <div class="card card-primary">
          
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addOurJourneyModal"> Add Journey </button>
          </div>
</div>
        </div>
              <div class="col-md-12">
                
                <table class="table table-bordered" id="journey-table">
                  <thead>
                    <tr>
                    <th>Description</th>
                      <th>Year</th>
                      <th>Image</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
</div>
</div>
</div>
</section>
</div>
<script>
  $(document).ready(function () {
    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
    
    var table = $('#award-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route("award.index") }}', 
            type: 'GET'
        },
        columns: [
            
            { data: 'award_title', name: 'award_title' },
            { data: 'award_year', name: 'award_year' },
            { data: 'award_logo', name: 'award_logo' },
            
        ]
    });
    $('#addAwardForm').on('submit', function(e) {
        e.preventDefault();  
       

        var formData = new FormData(this); 

        $.ajax({
            url: '{{ route("award.store") }}',  
            method: 'POST',
            data: formData,
            processData: false,  
            contentType: false, 
            success: function(response) {
                if (response.success) {
                   
                    $('#addAwardModal').modal('hide');
                    $('#addAwardForm')[0].reset();
                    alert(response.message);

                    
                    var rowNode = table.row.add({
                        
                        'award_title': response.data.award_title,
                        'award_year': response.data.award_year,
                        'award_logo': '<img src="' + response.data.award_logo + '" width="50" height="50" alt="Award Logo">',  // Assuming the award logo URL is provided in response
                        
                    }).draw(false);  
                } 
            },
            error: function(xhr, status, error) {
                
                alert('Something went wrong, please try again.');
            }
        });
    });
    

  });
   

</script>
<script>
  $(document).ready(function () {
    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
    var table = $('#journey-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route("journey.index") }}',  
            type: 'GET'
        },
        columns: [
            
            { data: 'journey_description', name: 'journey_description' },
            { data: 'journey_year', name: 'journey_year' },
            { data: 'journey_image', name: 'journey_image' },
            
        ]
    });
   
    

$('#addOurJourneyForm').on('submit', function(e) {
        e.preventDefault();  

        
       

        var formData = new FormData(this); 

        $.ajax({
            url: '{{ route("journey.store") }}',  
            method: 'POST',
            data: formData,
            processData: false, 
            contentType: false,  
            success: function(response) {
                if (response.success) {
                    $('#addOurJourneyModal').modal('hide');
                    $('#addOurJourneyForm')[0].reset();
                    alert(response.message);
                    var rowNode = table.row.add({
                        
                        'journey_description': response.data.journey_description,
                        'journey_year': response.data.journey_year,
                        'journey_image': '<img src="' + response.data.journey_image + '" width="50" height="50" alt="Award Logo">',  // Assuming the award logo URL is provided in response
                        
                    }).draw(false); 
                } 
                
            },
            error: function(xhr, status, error) {
                alert('Something went wrong, please try again.');
            }
        });
    });
  });
</script>
 @endsection