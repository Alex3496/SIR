<!-- Brand Logo -->
    <a href="{{route('principal')}}" class="brand-link">
      <img src="{{asset('images/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SIR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminLTE/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{route('admin.index')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                {{__('Inicio')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.users.index')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                {{__('Usuarios')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.posts.index')}}" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                {{__('Artículos')}}
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->