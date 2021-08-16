<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin/dashboard')}}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity:1; filter:invert()">
      <span class="brand-text font-weight-light">JDK Animal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">   
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{url('admin/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Aminals
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Animal list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('feeds.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Feed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('breeds.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Breed</p>
                </a>
              </li>
            </ul>
          </li> 
             
          <li class="nav-item">
            <a href="{{url('/admin/users')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                User Management           
              </p>
            </a>  
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/roles')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Role Management           
              </p>
            </a>  
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/permissions')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Permission Management           
              </p>
            </a>  
          </li>       
          <li class="nav-item">
            <a href="{{url('/admin/inventories')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Inventory Management           
              </p>
            </a>  
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>