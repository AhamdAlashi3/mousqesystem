@extends('cms.partents')

@section('title', 'Create Student_notes')
@section('page-name', 'Create Student_notes')
@section('main-page', 'Student_notes')
@section('sub-page', 'Create Student_notes')

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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Student_notes </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start     enctype="multipart/form-data"   -->
                        <form role="form" id="create_form" >
                            @csrf
                            <div class=" card-body">

                                <div class="form-group">
                                    <label>Students</label>
                                    <select class="form-control students" id="student_id" style="width: 100%;">
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->full_name }}</option>
                                        @endforeach
                                    </select>
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
                                    <label>Surah_name</label>
                                    <select class="form-control surahs" id="surah_id" style="width: 100%;">
                                        @foreach ($surahs as $surah)
                                            <option value="{{ $surah->id }}">{{ $surah->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="From_Quranic_verse">From_Quranic_verse</label>
                                    <input type="text" class="form-control" id="From_Quranic_verse" name="From_Quranic_verse"
                                        value="{{ old('From_Quranic_verse') }}" placeholder="Enter From_Quranic_verse">
                                </div>

                                <div class="form-group">
                                    <label for="to_Quranic_verse">To_Quranic_verse</label>
                                    <input type="text" class="form-control" id="to_Quranic_verse" name="to_Quranic_verse"
                                        value="{{ old('to_Quranic_verse') }}" placeholder="Enter to_Quranic_verse">
                                </div>

                                <div class="form-group">
                                    <label for="name_of_the_revised_surah">Name_of_the_revised_surah</label>
                                    <input type="text" class="form-control" id="name_of_the_revised_surah" name="name_of_the_revised_surah"
                                        value="{{ old('name_of_the_revised_surah') }}" placeholder="Enter name_of_the_revised_surah">
                                </div>

                                <div class="form-group">
                                    <label for="From_Quranic_verse_revised">From_Quranic_verse_revised</label>
                                    <input type="text" class="form-control" id="From_Quranic_verse_revised" name="From_Quranic_verse_revised"
                                        value="{{ old('From_Quranic_verse_revised') }}" placeholder="Enter From_Quranic_verse_revised">
                                </div>

                                <div class="form-group">
                                    <label for="to_Quranic_verse_revised">To_Quranic_verse_revised</label>
                                    <input type="text" class="form-control" id="to_Quranic_verse_revised" name="to_Quranic_verse_revised"
                                        value="{{ old('to_Quranic_verse_revised') }}" placeholder="Enter to_Quranic_verse_revised">
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
                        $('.students').select2({
                            theme: 'bootstrap4'
                        });
                        $('.classes').select2({
                            theme: 'bootstrap4'
                        });
                        $('.surahs').select2({
                            theme: 'bootstrap4'
                        });

                        $(document).ready(function() {
                            bsCustomFileInput.init();
                        });

                    </script>

                    <script>
                        function store() {
                            // Make a request for a user with a given ID
                            axios.post('/cms/admin/student_notes', {
                                    city_id: document.getElementById('city_id').value,
                                    Classes_id: document.getElementById('Classes_id').value,
                                    student_id: document.getElementById('student_id').value,
                                    surah_id: document.getElementById('surah_id').value,
                                    From_Quranic_verse: document.getElementById('From_Quranic_verse').value,
                                    to_Quranic_verse: document.getElementById('to_Quranic_verse').value,
                                    name_of_the_revised_surah : document.getElementById('name_of_the_revised_surah').value,
                                    From_Quranic_verse_revised: document.getElementById('From_Quranic_verse_revised').value,
                                    to_Quranic_verse_revised: document.getElementById('to_Quranic_verse_revised').value,
                                })
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
                            } else {
                                toastr.error(message)
                            }
                        }

                    </script>

                @endsection
