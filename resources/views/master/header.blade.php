<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h2 class="dropdown-item-title">
                  Selamat Datang
                </h2>
                <p class="text-sm"> {{auth()->user()->level}}</p>
              </div>
            </div>
            <!-- Message End -->
          </div>
          <a href="{{route('logout')}}" style="color:#fff" class="btn btn-danger dropdown-footer">Sign out</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>