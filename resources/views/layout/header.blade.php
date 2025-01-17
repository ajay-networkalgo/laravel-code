<!--Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      @if (Auth::check())
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">{{ Auth::user()->name }}</a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- <a href="#" id="edit_profile_btn" class="dropdown-item">
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title"><i class="far fa-user"></i> Edit Profile</h3>
                </div>
              </div>
            </a> -->
            <div class="dropdown-divider"></div>
            <a href="#" id="change_password_btn" class="dropdown-item">
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title"><i class="fas fa-envelope"></i> Change Password</h3>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('auth.logout') }}" class="dropdown-item">
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title"><i class="fas fa-power-off"></i> Logout</h3>
                </div>
              </div>
            </a>
          </div>
        </li>
      @endif
    </ul>
  </nav>
