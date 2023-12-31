<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('AdminLTE')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Persewaan Mobil</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('AdminLTE')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name ?? "Not found"}}</a>
        </div>
      </div>  

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{url('/')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('mobil.index')}}" class="nav-link" method="get">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Mobil
              </p>
              <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('mobil.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mobil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('mobil.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Mobil</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('pinjam.index')}}" class="nav-link" method="get">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Peminjaman Mobil
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('pengembalian.index')}}" class="nav-link" method="get">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Pengembalian Mobil
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Logout
              </p>
            </a>
          </li>                 
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>