<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="template_admin/index3.html" class="brand-link">
      <img src="{{asset('images/'.optional($configweb)->picture)}}" alt="{{optional($configweb)->site_name}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Personal Website</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('template_admin/dist/img/pasphoto2021.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Bertho Erizal</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{($active==='dashboard')?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/post" class="nav-link {{$active==='post'?'active':''}}">
            <i class="nav-icon fas fa-feather"></i>
              <p>
                Posts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/portfolio" class="nav-link {{$active==='portfolio'?'active':''}}">
            <i class="nav-icon fas fa-book"></i>
              <p>
                Portfolio
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/certificate" class="nav-link {{$active==='certificate'?'active':''}}">
            <i class="nav-icon fas fa-award"></i>
              <p>
                Certificate
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/experience" class="nav-link {{$active==='experience'?'active':''}}">
            <i class="nav-icon fas fa-shoe-prints"></i>
              <p>
                Experience
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/skill" class="nav-link {{($active==='skill')?'active':''}}">
            <i class="nav-icon fas fa-brain"></i>
              <p>
                Skill
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/configweb" class="nav-link {{$active==='configweb'?'active':''}}">
            <i class="nav-icon fas fa-wrench"></i>
              <p>
                Configuration
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
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