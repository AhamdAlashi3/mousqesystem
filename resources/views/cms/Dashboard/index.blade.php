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
          <div class="col-lg-3 col-6">
                <div class="small-box bg-gray-dark">
                  <div class="inner">
                    <h3>{{ $admins }}</h3>

                    <p>Admin Count</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-shield"></i>
                  </div>
                  <a href="{{ route('admin.index') }}" class="small-box-footer">admin/s <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                      <h3>{{ $users }}</h3>

                      <p>User Count</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-user"></i>
                    </div>
                    <a href="{{ route('user.index') }}" class="small-box-footer">user/s <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{ $cities }}</h3>

                  <p>City Count</p>
                </div>
                <div class="icon">
                  <i class="fas fa-city"></i>
                </div>
                <a href="{{ route('city.index') }}" class="small-box-footer">city/ies <i class="fas fa-arrow-circle-right"></i></a>
             </div>
            </div>

            <div class="col-lg-3 col-6">

             <div class="small-box bg-gradient-blue">
                <div class="inner">
                  <h3>{{ $students }}</h3>

                  <p>Student Count</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('student.index') }}" class="small-box-footer">student/s <i class="fas fa-arrow-circle-right"></i></a>
             </div>
            </div>


            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-green">
                  <div class="inner">
                    <h3>{{ $students_notes }}</h3>
                    <p>Student_Notes Count</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <a href="{{ route('student_notes.index') }}" class="small-box-footer">student_note/s <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-fuchsia">
                <div class="inner">
                  <h3>{{ $class }}</h3>
                  <p>Class Count</p>
                </div>
                <div class="icon">
                  <i class="fas fa-chalkboard"></i>
                </div>
                <a href="{{ route('class.index') }}" class="small-box-footer">classe/s <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-dark">
                    <div class="inner">
                      <h3>{{ $teachers }}</h3>
                      <p>teachers Count</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <a href="{{ route('teacher.index') }}" class="small-box-footer">teacher/s <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $leaders }}</h3>
                  <p>Leader Count</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-secret"></i>
                </div>
                <a href="{{ route('leader.index') }}" class="small-box-footer">leader/s <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-gradient-teal">
                <div class="inner">
                  <h3>{{ $supervisors }}</h3>
                  <p>supervisors Count</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-tie"></i>
                </div>
                <a href="{{ route('supervisor.index') }}" class="small-box-footer">supervisor/s <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ $surahs }}</h3>
                  <p>surah Count</p>
                </div>
                <div class="icon">
                  <i class="fas fa-book-open"></i>
                </div>
                <a href="{{ route('surah.index') }}" class="small-box-footer">surah/s <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>

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

