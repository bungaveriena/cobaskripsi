<aside class="main-sidebar sidebar-dark-primary elevation-4">
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
            <a href="/countries" class="nav-link active">
                <i class="fa fa-flag"></i>
              <p>
                References
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/countries" class="nav-link {{ Request::is('/countries') ? 'active' : '' }}">
                  <i class="fa fa-flag"></i>
                  <p>References List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/countries/create" class="nav-link {{ Request::is('/countries/create') ? 'active' : '' }}">
                  <i class="fa fa-flag"></i>
                  <p>Add References</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="/countries" class="nav-link active">
                <i class="fas fa-user"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/user/listuser" class="nav-link {{ Request::is('/listuser') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>User</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="/countries" class="nav-link active">
                <i class="fa fa-flag"></i>
              <p>
                Post
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/post/list" class="nav-link {{ Request::is('*/posts/list') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Post</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
