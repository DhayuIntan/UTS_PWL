 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Rental.in</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/orang.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Dhayu dan Novita</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href={{url('mobil')}} class="nav-link">
                <i class="nav-icon fas  fa-taxi"></i>
                <p>
                  Mobil
                  {{-- <i class="right fas fa-angle-left"></i> --}}
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href={{url('transaksi')}} class="nav-link">
                <i class="nav-icon fas fa-credit-card"></i>
                <p>
                  Transaksi
                  {{-- <i class="right fas fa-angle-left"></i> --}}
                </p>
              </a>
            </li>

            <li class="nav-item">
                <a href={{url('logout')}} class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Logout
                    {{-- <i class="right fas fa-angle-left"></i> --}}
                  </p>
                </a>
              </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
