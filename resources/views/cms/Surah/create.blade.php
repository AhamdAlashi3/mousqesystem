@extends('cms.partents')

@section('title', 'Create Surah')
@section('page-name', 'Create Surah')
@section('main-page', 'Surah')
@section('sub-page', 'Create Surah')

@section('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" /> --}}
    <link rel="stylesheet"
        href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css') }}" />

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
                            <h3 class="card-title">Create Surah</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="create_form" >
                            @csrf
                            <div class=" card-body">

                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="Enter name">
                                </div>


                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="active" class="custom-control-input" id="active">
                                        <label class="custom-control-label" for="active">Active Status</label>
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
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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

                        $(document).ready(function() {
                            bsCustomFileInput.init();
                        });

                    </script>

                    <script>
                        function store() {
                            // Make a request for a user with a given ID
                            axios.post('/cms/admin/surah', {
                                    name: document.getElementById('name').value,
                                    active: document.getElementById('active').value,
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

