<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link text-center">
      <img src="{{ asset('assets/img/logo.png')}}" width="60%"/>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel justify-content-center mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="{{asset('assets/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a class="d-block">{{{ isset (Auth::user()->name) ? Auth::user()->name : Auth::user()->name }}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header">Menu</li>
               <li class="nav-item has-treeview menu-open">
            <a href="/" class="nav-link active">
                <i class="fa fa-flag"></i>
              <p>
                Data Pengaduan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('datajadwalkonsul.index') }}" class="nav-link {{ Request::is('*/posts/list') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Data Pengaduan Form Publik</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('summary.index') }}" class="nav-link active">
                <i class="fa fa-flag"></i>
              <p>
                Data Pengajuan Cek
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('summary.index') }}" class="nav-link {{ Request::is('*/posts/list') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Data Pengajuan Cek Form Publik</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('datajadwalkonsul.index') }}" class="nav-link active">
                <i class="fa fa-flag"></i>
              <p>
                Data Jadwal Konsul
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('listJadwal') }}" class="nav-link {{ Request::is('/countries') ? 'active' : '' }}">
                  <i class="fa fa-flag"></i>
                  <p>Jadwal Pendampingan</p>
                </a>
              </li>
              @if (Auth::user()->role_id == 1)
              <li class="nav-item">
                <a href="{{ route('datapendamping.index') }}" class="nav-link {{ Request::is('/countries/create') ? 'active' : '' }}">
                  <i class="fa fa-flag"></i>
                  <p>Data Pendamping</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('summary.index') }}" class="nav-link active">
                <i class="fas fa-user"></i>
              <p>
                Summary
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('listSummary') }}" class="nav-link {{ Request::is('/listuser') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Data Summary</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="/countries" class="nav-link active">
                <i class="fa fa-flag"></i>
              <p>
                Map
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/map" class="nav-link {{ Request::is('*/posts/list') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Dashboard Map</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pelaku.index') }}" class="nav-link {{ Request::is('*/posts/list') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-file"></i>
                  <p>List Pelaku</p>
                </a>
              </li>
            </ul>
          </li>
          @if (Auth::user()->role_id == 1)
          <li class="nav-item has-treeview menu-open">
            <a href="/user" class="nav-link active">
                <i class="fa fa-flag"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link {{ Request::is('*/posts/list') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-file"></i>
                  <p>User Management</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
