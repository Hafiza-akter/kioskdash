 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link ">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link ">Contact</a>
      </li>
    </ul>

 

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
      </li>
      <li class="nav-item">
        <a class="nav-link "  href="{{route('logout')}}">
          Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">KIOSK ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user-thumb.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          <?php 
          if(Session()->get('is_admin') != 0){ ?>
            Admin
            <?php }else{ ?>
              {{$user->username}} 
            <?php }
              ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          

          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{ ($is_active == 'home') ? 'active' :''  }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Home
              </p>
            </a>
          </li>
          <?php if(Session()->get('is_admin') != 0) {?>
        
          <li class="nav-item has-treeview {{ ($is_active == 'user' || $is_active == 'userlist' || $is_active == 'useradd') ? 'menu-open' :''  }}">
            <a href="{{route('userlist')}}" class="nav-link {{ ($is_active == 'user' || $is_active == 'userlist' || $is_active == 'useradd') ? 'active' :''  }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('userlist')}}" class="nav-link {{ ($is_active == 'userlist') ? 'active' :''  }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('useradd')}}" class="nav-link {{ ($is_active == 'useradd') ? 'active' :''  }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ ($is_active == 'slideList' || $is_active == 'floodSummary' || $is_active == 'slideImageList') ? 'menu-open' :''  }}">
            <a href="#" class="nav-link {{ ($is_active == 'slideList' || $is_active == 'floodSummary' || $is_active == 'slideImageList') ? 'active' :''  }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
              Slide Configuration
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('slidelist')}}" class="nav-link {{ ($is_active == 'slideList') ? 'active' :''  }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Duration Setting</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="{{route('floodsummary')}}" class="nav-link {{ ($is_active == 'floodSummary') ? 'active' :''  }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flood Summary</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="{{route('slide.image.list')}}" class="nav-link {{ ($is_active == 'slideImageList') ? 'active' :''  }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Image Upload</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          
    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
