@extends('cms.partents')

@section('title', 'Create Permissions')
@section('page-name', 'Create Permissions')
@section('main-page', 'Permissions')
@section('sub-page', 'Create Permissions')

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
                            <h3 class="card-title">Create Permissions </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="create_form">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Guards</label>
                                    <select class="form-control guards" id="guard" style="width: 100%;">
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Permission Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="Enter name">
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
                        $('.guards').select2({
                            theme: 'bootstrap4'
                        });

                        $(document).ready(function() {
                            bsCustomFileInput.init();
                        });

                    </script>


                    <script>
                        function store() {
                            // Make a request for a user with a given ID
                            axios.post('/cms/admin/permissions', {
                                    guard: document.getElementById('guard').value,
                                    name: document.getElementById('name').value,
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
