<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <form action="/logout" method="post" class="nav-link">
        @csrf
        <button type="submit" class="btn btn-light btn-sm" style="position: relative; top: -5px;">
          <i class="nav-icon fas fa-sign-out-alt"></i> Logout
        </button>
      </form>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>