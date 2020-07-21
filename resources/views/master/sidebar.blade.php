<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <h2 style="color:#ffff" href="#" class="d-block">{{auth()->user()->level}}</h2>
        </div>
      </div>
      

      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{route('home')}}" class="nav-link {{ (request()->is(['home'])) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('tukangcukur')}}" class="nav-link {{ (request()->is(['tukangcukur'])) ? 'active' : '' }}">
              <i class="nav-icon fa fa-scissors"></i>
              <p>
                Tukang Cukur
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('promo')}}" class="nav-link {{ (request()->is(['promo'])) ? 'active' : '' }}">
              <i class="nav-icon fa fa-tags"></i>
              <p>
                Data Promo
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('customer')}}" class="nav-link {{ (request()->is(['customer'])) ? 'active' : '' }}">
              <i class="nav-icon fa fa-address-book"></i>
              <p>
               Customer
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('hargapotong')}}" class="nav-link {{ (request()->is(['hargapotong'])) ? 'active' : '' }}">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Harga Potong Rambut
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('modelrambut')}}" class="nav-link {{ (request()->is(['modelrambut'])) ? 'active' : '' }}">
              <i class="nav-icon fa fa-book"></i>
              <p>
               Model Rambut
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>