<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MosqeSystem | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Site Icons -->
<link rel="shortcut icon" href="{{ asset('mosuqe/images/Untitled design.png') }}" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" >
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-green navbar-dark" style="color: green">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('cms/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('cms/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('cms/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('cms/dist/img/amin.jpg') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Al-Amin-Muhammed</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('cms/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
             <a href="#" class="d-block">{{ Auth::user()->full_name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="color: green">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{ route('index') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard 1</p>
                </a>
              </li>
            </ul>

        <li class="nav-header">Content Manegmant</li>

        @canany(['Read-Admins', 'Create-Admins'])
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-user-shield"></i>
                 <p>
                   Admins
                   <i class="fas fa-angle-left right"></i>
                 </p>
               </a>
               <ul class="nav nav-treeview">
                   @can('Read-Admins')
                    <li class="nav-item">
                      <a href="{{route('admin.index')}}" class="nav-link">
                        <i class="fas fa-indent nav-icon"></i>
                        <p>index</p>
                      </a>
                    </li>
                   @endcan

                 @can('Create-Admins')
                   <li class="nav-item">
                     <a href="{{route('admin.create')}}" class="nav-link">
                       <i class="fas fa-plus-circle nav-icon"></i>
                       <p>create</p>
                     </a>
                   </li>
                 @endcan
               </ul>
            </li>
        @endcanany

        @canany(['Read-Users', 'Create-Users'])
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            @can('Read-Users')
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                  <i class="fas fa-indent nav-icon"></i>
                  <p>index</p>
                </a>
              </li>
            @endcan

            @can('Create-Users')
              <li class="nav-item">
                <a href="{{route('user.create')}}" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>create</p>
                </a>
              </li>
            @endcan
            </ul>
          </li>
        @endcanany

        @canany(['Read-Cities', 'Create-Cities'])
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-city"></i>
              <p>
                Cities
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            @can('Read-Cities')
              <li class="nav-item">
                <a href="{{ route('city.index') }}" class="nav-link">
                  <i class="fas fa-indent nav-icon"></i>
                  <p>index</p>
                </a>
              </li>
              @endcan

            @can('Create-Cities')
              <li class="nav-item">
                <a href="{{ route('city.create') }}" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>create</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
        @endcanany



          @canany(['Read-Students','Create-Students'])
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Students
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('Read-Students')
              <li class="nav-item">
                <a href="{{ route('student.index') }}" class="nav-link">
                  <i class="fas fa-indent nav-icon"></i>
                  <p>index</p>
                </a>
              </li>
              @endcan

              @can('Create-Students')
              <li class="nav-item">
                <a href="{{ route('student.create') }}" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>create</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcanany



          @canany(['Read-Student_notes','Create-Student_notes'])
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Student notes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('Read-Student_notes')
              <li class="nav-item">
                <a href="{{ route('student_notes.index') }}" class="nav-link">
                  <i class="fas fa-indent nav-icon"></i>
                  <p>index</p>
                </a>
              </li>
              @endcan

              @can('Create-Student_notes')
              <li class="nav-item">
                <a href="{{ route('student_notes.create') }}" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>create</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcanany

          @canany(['Read-Classess','Create-Classess'])
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard"></i>
              <p>
                Class
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              @can('Read-Classess')
              <li class="nav-item">
                <a href="{{ route('class.index') }}" class="nav-link">
                  <i class="fas fa-indent nav-icon"></i>
                  <p>index</p>
                </a>
              </li>
              @endcan

              @can('Create-Classess')
                <li class="nav-item">
                  <a href="{{ route('class.create') }}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>create</p>
                  </a>
                </li>
              @endcan
            </ul>
          </li>
          @endcanany

          @canany(['Read-Teachers','Create-Teachers'])
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Teachers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('Read-Teachers')
                <li class="nav-item">
                  <a href="{{ route('teacher.index') }}" class="nav-link">
                    <i class="fas fa-indent nav-icon"></i>
                    <p>index</p>
                  </a>
                </li>
              @endcan

              @can('Create-Teachers')
                <li class="nav-item">
                  <a href="{{ route('teacher.create') }}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>create</p>
                  </a>
                </li>
              @endcan
            </ul>
          </li>
          @endcanany

          @canany(['Read-Teachers','Create-Teachers'])
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-secret"></i>
              <p>
                Leaders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('Read-Teachers')
                <li class="nav-item">
                  <a href="{{ route('leader.index') }}" class="nav-link">
                    <i class="fas fa-indent nav-icon"></i>
                    <p>index</p>
                  </a>
                </li>
              @endcan

              @can('Create-Teachers')
                <li class="nav-item">
                  <a href="{{ route('leader.create') }}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>create</p>
                  </a>
                </li>
              @endcan
            </ul>
          </li>
          @endcanany

          @canany(['Read-Teachers','Create-Teachers'])
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Supervisor
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('Read-Teachers')
                <li class="nav-item">
                  <a href="{{ route('supervisor.index') }}" class="nav-link">
                    <i class="fas fa-indent nav-icon"></i>
                    <p>index</p>
                  </a>
                </li>
              @endcan

              @can('Create-Teachers')
                <li class="nav-item">
                  <a href="{{ route('supervisor.create') }}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>create</p>
                  </a>
                </li>
              @endcan
            </ul>
          </li>
          @endcanany


          @canany(['Read-Teachers','Create-Teachers'])
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Surah
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('Read-Teachers')
                <li class="nav-item">
                  <a href="{{ route('surah.index') }}" class="nav-link">
                    <i class="fas fa-indent nav-icon"></i>
                    <p>index</p>
                  </a>
                </li>
              @endcan

              @can('Create-Teachers')
                <li class="nav-item">
                  <a href="{{ route('surah.create') }}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>create</p>
                  </a>
                </li>
              @endcan
            </ul>
          </li>
          @endcanany



          @canany(['Create-Roles', 'Read-Roles', 'Create-Permissions', 'Read-Permissions'])
                  <li class="nav-header">Roles & Permissions</li>
          @endcanany

                        @canany(['Read-Roles', 'Create-Roles'])

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-pencil-ruler"></i>
                                    <p>
                                        Roles
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Read-Roles')
                                        <li class="nav-item">
                                            <a href="{{ route('roles.index') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-Roles')
                                        <li class="nav-item">
                                            <a href="{{ route('roles.create') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan


                                </ul>
                            </li>
                        @endcanany

                        @canany(['Read-Permissions', 'Create-Permissions'])
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user-tie"></i>
                                    <p>
                                        Permissions
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Read-Permissions')
                                        <li class="nav-item">
                                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-Permissions')
                                        <li class="nav-item">
                                            <a href="{{ route('permissions.create') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanany

          <li class="nav-header">Settings</li>


          <li class="nav-item">

              <a href="{{ route('auth.edit-profile') }}" class="nav-link">
                  <i class="nav-icon fas fa-user-edit"></i>
                  <p class="text">Edit Profile</p>
              </a>
          </li>

          <li class="nav-item">

              <a href="{{ route('auth.edit-password') }}" class="nav-link">
                  <i class="nav-icon fas fa-lock"></i>
                  <p class="text">Change Password</p>
              </a>
          </li>

           <li class="nav-item">
            @if (Auth::guard('admin')->check())
                <a href="{{ route('auth.logout') }}" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p class="text">Logout</p>
                </a>
            @else
                <a href="{{ route('auth-user.logout') }}" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p class="text">Logout</p>
                </a>
            @endif
        </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('page-name')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">@yield('main-page')</a></li>
              <li class="breadcrumb-item active">@yield('sub-page')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer" >
    <strong>Copyright &copy; {{ now()->year }} <a href="#"><span class="badge bg-info">Al-Amin Muhammed Mosque</span></a> . </strong> All rights
    reserved.
    <h3>The <span class="badge bg-danger"> Developers </span> : <span class="badge bg-success">Ahmad Alashi (Abo_Hamza)<span></h3>
</footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('cms/dist/js/demo.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/crud.js') }}"></script>
    @yield('scripts')
</body>
</html>
