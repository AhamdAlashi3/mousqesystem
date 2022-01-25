@extends('cms.partents')

@section('title','Dashboard')
@section('page-name','Dashboard')
@section('main-page','Dashboard')
@section('sub-page','Dashboard')

@section('styles')
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-shield"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('admin.index') }}">Admins</a></span>
                    <span class="info-box-number">
                        {{ $admins }}
                      <small>admin/s</small>
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('user.index') }}">Users</a></span>
                <span class="info-box-number">{{ $users }}
                    <small>user/s</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-city"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('city.index') }}">Cities</a></span>
                <span class="info-box-number">{{ $cities }}
                    <small>city/ies</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('student.index') }}">Students</a></span>
                <span class="info-box-number">{{ $students }}
                    <small>sutdent/s</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-gray-dark elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('student_notes.index') }}">Students_notes</a></span>
                <span class="info-box-number">{{ $students_notes }}
                    <small>students_note/s</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chalkboard"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('class.index') }}">Class</a></span>
                <span class="info-box-number">{{ $class }}
                    <small>class/es</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('teacher.index') }}">Teachers</a></span>
                <span class="info-box-number">{{ $teachers }}
                    <small>teacher/s</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-gray-dark elevation-1"><i class="fas fa-user-secret"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('leader.index') }}">Leaders</a></span>
                <span class="info-box-number">{{ $leaders }}
                    <small>leader/s</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-gradient-yellow elevation-1"><i class="fas fa-user-tie"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('supervisor.index') }}"> Supervisors</a></span>
                <span class="info-box-number">{{ $supervisors }}
                    <small>supervisor/es</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('surah.index') }}"> Surahs</a></span>
                <span class="info-box-number">{{ $surahs }}
                    <small>surah/s</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')

<!-- overlayScrollbars -->
<script src="{{ asset('cms/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('cms/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('cms/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('cms/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('cms/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('cms/plugins/chart.js/Chart.min.js') }}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{ asset('cms/dist/js/pages/dashboard2.js') }}"></script>

@endsection

