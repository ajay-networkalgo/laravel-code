<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="{{ asset('/assets/favicon.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Olax Power</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('css/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('css/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('css/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('css/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('css/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('css/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('js/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('js/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('css/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('css/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('css/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <script src="{{ asset('css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <script src="{{ asset('js/adminlte.js') }}"></script>
  <script src="{{ asset('js/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
  <script src="{{ asset('js/raphael/raphael.min.js') }}"></script>
  <script src="{{ asset('js/jquery-mapael/jquery.mapael.min.js') }}"></script>
  <script src="{{ asset('js/jquery-mapael/maps/usa_states.min.js') }}"></script>
  <script src="{{ asset('js/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('js/demo.js') }}"></script>
  <!-- <script src="{{ asset('js/pages/dashboard2.js') }}"></script> -->
  <script src="{{ asset('css/summernote/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('css/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('js/moment/moment.min.js') }}"></script>
  <script src="{{ asset('css/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


  <style type="text/css">
    .error{
      color:red;
    }
    #user_list tbody tr{
      text-align: center;
    }
    #roles_list tbody tr{
      text-align: center;
    }
    #news_list tbody tr{
      text-align: center;
    }
    #blog_list tbody tr{
      text-align: center;
    }
    #events_list tbody tr{
      text-align: center;
    }
    #contact_list tbody tr{
      text-align: center;
    }
    #success_stories_list tbody tr{
      text-align: center;
    }
    #news_letter_list tbody tr{
      text-align: center;
    }
    #global_contacts_list tbody tr{
      text-align: center;
    }
    #product_list tbody tr{
      text-align: center;
    }
    #company_info_list tbody tr{
      text-align: center;
    }
    #marketing_list tbody tr{
      text-align: center;
    }
    .card-img-top {
      border-top-left-radius: 4px;
      border-top-right-radius: 4px;
      width: 100%;
      height: 150px;
      object-fit: cover;
    }
    .select2-selection__choice{
      color: black !important;
    }
    .image-container {
    position: relative;
    overflow: hidden;
}

.image-container img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s;
}

.image-container:hover img {
    transform: scale(1.05);
}

.delete-image-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    opacity: 0.8;
    transition: opacity 0.3s;
}

.delete-image-btn:hover {
    opacity: 1;
}
.module-permission-item{
  padding: 10px;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        border-radius: 5px;
        display: inline-block;
        width: 200px;
        margin-right: 10px;
}

  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->
  @if(Auth::check())
    @include('layout.header')
  @endif
  @if(Auth::check())
    @include('layout.sidebar')
  @endif
  @yield('page-content')
  @if(Auth::check())
    @include('layout.footer')
  @endif
</div>
<div id="editprofile" class="modal fade bd-example-modal-lg" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="" method="post" id="updateProfileForm">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="type" id="type" value="profile" />
        <div class="modal-header">
          <h4 class="modal-title">Edit Profile</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="panel-body p-0">
                <div class="form-group row">
                  <label for="fieldname" class="col-md-2 control-label">Name<span style="color: red;">*</span></label>
                  <div class="col-md-10">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ Auth::user()->name }}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="fieldname" class="col-md-2 control-label">Email<span style="color: red;">*</span></label>
                  <div class="col-md-10">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="float: right;">
            <input type="submit" id="submitadd" class="btn btn-primary frmbtn" name="submitadd" value="Update">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="change_password_modal" class="modal fade bd-example-modal-lg" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('auth.change.password') }}" method="post" id="updateChangePasswordForm">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Change Password</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="panel-body p-0">
                <div class="form-group row">
                  <label for="fieldname" class="col-md-3 control-label">New Password<span style="color: red;">*</span></label>
                  <div class="col-md-9">
                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="fieldname" class="col-md-3 control-label">Confirm Password<span style="color: red;">*</span></label>
                  <div class="col-md-9">
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="float: right;">
            <input type="submit" id="update_password" class="btn btn-primary" name="update_password" value="Update">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/jquery_validtion.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.related_all_product').select2();
  });
</script>
</body>
</html>
