<!--
  Brand Logo
-->
<a href="{{ route('principal') }}" class="brand-link">
  <img src="{{ asset('images/logos/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"/>
  <span class="brand-text font-weight-light">SIR</span>
</a>
<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <div id="profile-image" style="background-image: url('{{$user->get_image}}')" class="img-circle elevation-2">
      </div>
    </div>
    <div class="info">
      <a href="#" class="d-block">{{ $user->name }}</a>
    </div>
  </div>
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

      @if($user->hasRole('admin'))
        <li class="nav-item">
        <a href="{{ route('admin.index') }}" class="nav-link">
          <i class="nav-icon fas fa-lock"> </i>
          <p>{{ __('Administracion') }}</p>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link">
          <i class="nav-icon fas fa-home"> </i>
          <p>{{ __('Inicio') }}</p>
        </a>
      </li>
      <li class="nav-item has-treeview ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-briefcase"> </i>
          <p>
            {{ __('Cuenta') }}
            <i class="right fas fa-angle-left"> </i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('profile.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"> </i>
              <p>{{ __('Perfil') }}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('profile.company') }}" class="nav-link">
              <i class="nav-icon fas fa-building"> </i>
              <p>{{ __('Empresa') }}</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{ route('tariffs.index') }}" class="nav-link">
          <i class="nav-icon fas fa-truck"> </i>
          <p>{{ __('Tarifas') }}</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('petitions.index') }}" class="nav-link">
          <i class="nav-icon fas fa-map-pin"> </i>
          <p>{{ __('Peticiones') }}</p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
