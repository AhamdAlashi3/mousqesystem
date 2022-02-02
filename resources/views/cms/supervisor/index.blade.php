@extends('cms.partents')

@section('title', 'Index supervisor')
@section('page-name', 'Index supervisor')
@section('main-page', 'supervisor')
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
                            <a href="{{ route('supervisor.create') }}"
                                class="btn btn-info"><i
                                class="fas fa-plus"></i> Add Supervisor </a>
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
                                        <th>First_name</th>
                                        <th>Last_name</th>
                                        <th>City</th>
                                        <th>Teacher</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Deleted_at</th>
                                        <th>Created_at</th>
                                        <th>Updated_at</th>
                                        <th>Action</th>
                                <tbody>
                                    @foreach ($supervisors as $index => $supervisor)
                                        <tr>
                                            <td><span class="badge bg-dark">{{ $index + 1 }}</span></td>
                                            <td>{{ $supervisor->first_name }}</td>
                                            <td>{{ $supervisor->last_name }}</td>
                                            <td><span class="badge bg-info">{{ $supervisor->cities->name }}</span></td>
                                            <td><span class="badge bg-fuchsia">{{ $supervisor->teachers->full_name }}</span></td>
                                            <td>{{ $supervisor->email }}</td>
                                            <td>{{ $supervisor->phone }}</td>
                                            <td><span class="badge bg-success">{{ $supervisor->gender_title }}</span></td>

                                             <td><span @if ($supervisor->deleted_at) class="badge bg-success"@else class="badge bg-danger" @endif>{{ $supervisor->trashed() ? 'true' : 'false' }}</span>
                                            </td>
                                            <td>{{ $supervisor->created_at->diffForHumans() }}</td>
                                            <td>{{ $supervisor->updated_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    @canany(['Update-Supervisors'],['Delete-Supervisors'])

                                                        @can('Update-Supervisors')
                                                            <a href="{{ route('supervisor.edit', $supervisor->id) }}" type="button"
                                                                class="btn btn-info">
                                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                                            </a>
                                                        @endcan


                                                        @can('Delete-Supervisors')
                                                            @if (!$supervisor->trashed())
                                                                {{-- @if (Auth::user()->id !== $supervisor->id) --}}
                                                                    <a href="#" class="btn btn-danger"
                                                                        onclick="confirmDestroy({{ $supervisor->id }}, this)"><i
                                                                            class="fas fa-trash"></i></a>
                                                                {{-- @endif --}}
                                                            @endif
                                                        @endcan
                                                    @endcanany

                                                    @if ($supervisor->trashed())
                                                        <a href="#" class="btn btn-success"
                                                            onclick="restore({{ $supervisor->id }})"><i
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

                            {{ $supervisors->links() }}


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
            axios.delete('/cms/admin/supervisor/' + id + "/restore")
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

            axios.delete('/cms/admin/supervisor/' + id)
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
