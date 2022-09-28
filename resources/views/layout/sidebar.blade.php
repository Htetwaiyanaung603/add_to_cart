<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Htet Wai Yan Aung</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item {{ request()->is('product') ? 'bg-info' : ''}}">
            <a href="{{ route('productIndex') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
              <p>
                Entry Product
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('products') ? 'bg-info' : ''}}">
            <a href="{{ route('productAll') }}" class="nav-link">
                <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Product
              </p>
            </a>
          </li>
          <li class="nav-item bg-danger">
            <a href="{{ route('authLogout') }}" class="nav-link">
                {{-- <i class="nav-icon fa fa-logout"></i> --}}
                <i class="nav-icon fa fa-sing-out"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>