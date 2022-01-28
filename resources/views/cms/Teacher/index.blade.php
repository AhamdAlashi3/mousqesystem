@extends('cms.partents')

@section('title', 'Index Teacher')
@section('page-name', 'Index Teacher')
@section('main-page', 'Teachers')
@section('sub-page', 'Index')

@section('styles')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Teacher</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>First_name</th>
                                        <th>Last_name</th>
                                        <th>City</th>
                                        <th>Student Count</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Is Deleted</th>
                                        <th>Created_at</th>
                                        <th>Updated_at</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $index => $teacher)
                                        <tr>
                                            <td><span class="badge bg-dark">{{ $index + 1 }}</span></td>
                                            <td><img src="{{ asset('cms/img/'.$teacher->image) }}"  height="100" width="100"/></td>
                                            <td>{{ $teacher->first_name }}</td>
                                            <td>{{ $teacher->last_name }}</td>
                                            <td><span class="badge bg-info">{{ $teacher->cities->name }}</span></td>
                                            </td>
                                            <td><a href="{{ route('student.index') }}"><span class="badge bg-info">{{ $teacher->students_count }} Student/s</span></a></td>
                                            <td>{{ $teacher->email }}</td>
                                            <td>{{ $teacher->phone }}</td>
                                            <td><span class="badge bg-success">{{ $teacher->gender_title }}</span></td>

                                             <td><span @if ($teacher->deleted_at) class="badge bg-success"@else class="badge bg-danger" @endif>{{ $teacher->trashed() ? 'true' : 'false' }}</span>
                                            </td>
                                            <td>{{ $teacher->created_at->diffForHumans() }}</td>
                                            <td>{{ $teacher->updated_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="btn-group">

                                                    @canany(['Update-Teachers'],['Delete-Teachers'])
                                                        @can('Update-Teachers')
                                                            <a href="{{ route('teacher.edit', $teacher->id) }}" type="button"
                                                                class="btn btn-info">
                                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                                            </a>
                                                        @endcan

                                                        @can('Delete-Teachers')
                                                            @if (!$teacher->trashed())
                                                                    <a href="#" class="btn btn-danger"
                                                                        onclick="confirmDestroy({{ $teacher->id }}, this)"><i
                                                                            class="fas fa-trash"></i></a>
                                                            @endif
                                                        @endcan
                                                    @endcanany

                                                    @if ($teacher->trashed())
                                                        <a href="#" class="btn btn-success"
                                                            onclick="restore({{ $teacher->id }})"><i
                                                                class="fas fa-trash-restore"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{-- {{ $merchants->render() }} --}}

                            {{ $teachers->links() }}


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function confirmDestroy(id, td) {
            // console.log("WE ARE IN JS");
            // alert("WELCOME IN JS");
            // console.log("CITY ID: " + id);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    /*
                    -> Confirm:
                        1) Delete City (JS)
                        2) Delete Row from table
                        3) Show Success Alert
                    */
                    destroy(id, td);
                }
            });
        }

        function restore(id) {
            axios.delete('/cms/admin/teacher/' + id + "/restore")
                .then(function(response) {
                    // handle success
                    console.log(response.data);
                    // td.closest('tr').remove();
                    showAlert(response.data);
                })
                .catch(function(error) {
                    // handle error
                    // console.log(error);
                    console.log(error.response);
                    showAlert(error.response.data);
                })
                .then(function() {
                    // always executed
                });
        }

        function destroy(id, td) {

            axios.delete('/cms/admin/teacher/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response.data);
                    td.closest('tr').remove();
                    showAlert(response.data);
                })
                .catch(function(error) {
                    // handle error
                    // console.log(error);
                    console.log(error.response);
                    showAlert(error.response.data);
                })
                .then(function() {
                    // always executed
                });
        }

        function showAlert(data) {
            // Swal.fire(
            //     data.title,
            //     data.message,
            //     data.icon
            // )

            Swal.fire({
                title: data.title,
                text: data.message,
                icon: data.icon,
                timer: 2000,
                showConfirmButton: false,
                timerProgressBar: false,
                willOpen: () => {
                    // Swal.showLoading()
                },
                willClose: () => {

                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            });
        }
    </script>
@endsection
