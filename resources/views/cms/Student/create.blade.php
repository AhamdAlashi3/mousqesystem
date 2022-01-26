@extends('cms.partents')

@section('title', 'Create Student')
@section('page-name', 'Create Student')
@section('main-page', 'Student')
@section('sub-page', 'Create Student')

@section('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Create Student </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start        -->
                        <form role="form" id="create_form" enctype="multipart/form-data">
                            @csrf
                            <div class=" card-body">

                                <div class="form-group">
                                    <label for="first_name">First_name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        value="{{ old('first_name') }}" placeholder="Enter first_name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last_name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        value="{{ old('last_name') }}" placeholder="Enter last_name">
                                </div>
                                <div class="form-group">
                                    <label for="Data_Of_Barth">Data OF Barth</label>
                                    <input type="text" class="form-control" id="Data_Of_Barth" name="Data_Of_Barth"
                                        value="{{ old('Data_Of_Barth') }}" placeholder="Enter Data OF Barth">
                                </div>
                                <div class="form-group">
                                    <label>Cities</label>
                                    <select class="form-control cities" id="city_id" style="width: 100%;">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>classes</label>
                                    <select class="form-control classes" id="Classes_id" style="width: 100%;">
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Teachers</label>
                                    <select class="form-control teachers" id="teacher_id" style="width: 100%;">
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" value="{{ old('email') }}"
                                        name="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ old('phone') }}" placeholder="Enter phone">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="male" name="gender">
                                        <label for="male" class="custom-control-label">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="female" name="gender">
                                        <label for="female" class="custom-control-label">Female</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="file">Avatar</label>
                                        <input type="file" name="file" placeholder="Choose image" id="image" class="form-control">
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onclick="store()" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                @endsection


                @section('scripts')

                    <!-- Toastr -->
                    <script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>

                    <!-- Select2 -->
                    <script src="{{ asset('cms/plugins/select2/js/select2.full.min.js') }}"></script>

                    <!-- bs-custom-file-input -->
                    <script src="{{ asset('cms/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

                    <script type="text/javascript">
                        //Initialize Select2 Elements
                        $('.cities').select2({
                            theme: 'bootstrap4'
                        });
                        $('.classes').select2({
                            theme: 'bootstrap4'
                        });
                        $('.teachers').select2({
                            theme: 'bootstrap4'
                        });

                        $(document).ready(function() {
                            bsCustomFileInput.init();
                        });

                    </script>

                                <script>
                                    function store() {

                                        let data = new FormData();
                                        data.append('city_id', document.getElementById('city_id').value);
                                        data.append('Classes_id', document.getElementById('Classes_id').value);
                                        data.append('teacher_id', document.getElementById('teacher_id').value);
                                        data.append('Data_Of_Barth', document.getElementById('Data_Of_Barth').value);
                                        data.append('first_name', document.getElementById('first_name').value);
                                        data.append('last_name', document.getElementById('last_name').value);
                                        data.append('phone', document.getElementById('phone').value);
                                        data.append('email', document.getElementById('email').value);
                                        data.append('gender', document.getElementById('male').checked ? 'M' : 'F');
                                        data.append('image', document.getElementById('image').files[0]);

                                 // Make a request for a user with a given ID
                                 axios.post('/cms/admin/student',  data)
                                     .then(function(response) {
                                         // handle success
                                         console.log(response.data);
                                         document.getElementById("create_form").reset();
                                         showtoster(true, response.data.message);
                                     })
                                     .catch(function(error) {
                                                // handle error
                                                console.log(error.response);
                                                showtoster(false, error.response.data.message);
                                            });
                                        }

                                     function showtoster(status, message) {
                                         if (status) {
                                            toastr.success(message)
                                        }else {
                                            toastr.error(message)
                                        }
                                    }

                                </script>

                @endsection
