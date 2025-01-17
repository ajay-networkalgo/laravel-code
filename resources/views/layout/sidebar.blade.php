<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="javascript:void(0)" class="brand-link">
    <img src="https://d3gmvp5nwny4u2.cloudfront.net/assets/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SolaX Power USA</span>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @foreach($modules as $module)
          <li class="nav-item">
            <a href="{{ route($module->action_name) }}" class="nav-link  @if(request()->route()->getName() === $module->action_name) active @endif">
              <i class="nav-icon {{ $module->icon }}"></i>
              <p>{{ $module->title }}</p>
            </a>
            @if($module->id == "13")
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('home_page.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Homepage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('homeowner-page.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Homeowner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('installer_page.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Installer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product_page.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Productpage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('news_page.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Newspage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('about_page.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aboutpage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('blogs_page.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blogspage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('success_stories_page.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SuccessStoriesPage</p>
                </a>
              </li>
            </ul>
            @endif
          </li>
        @endforeach
        @if($role_id == 1)
          <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link @if(request()->route()->getName() === 'roles.index') active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p>Role management</p>
            </a>
          </li>
        @endif
        <li class="nav-item">
          <a href="{{ route('auth.logout') }}" class="nav-link">
            <i class="nav-icon fas fa-power-off"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
