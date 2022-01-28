@extends('cms.partents')

@section('title', 'Index Admin')
@section('page-name', 'Index Admin')
@section('main-page', 'Admin')
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
                            <h3 class="card-title">Data Admin</h3>
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
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Permissions</th> 
                                        <th>Deleted_at</th>
                                        <th>Created_at</th>
                                        <th>Updated_at</th>
                                        <th>Action</th>
                                <tbody>
                                    @foreach ($admins as $index => $admin)
                                        <tr>
                                            <td><span class="badge bg-dark">{{ $index + 1 }}</span></td>
                                            <td><img src="{{ asset('cms/img/'.$admin->image) }}"  height="100" width="100"/></td>
                                            <td>{{ $admin->first_name }}</td>
                                            <td>{{ $admin->last_name }}</td>
                                            <td><span class="badge bg-info">{{ $admin->cities->name }}</span></td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->phone }}</td>
                                            <td><span class="badge bg-success">{{ $admin->gender_title }}</span></td>
                                            <td><a href="{{ route('admin.permission.index', $admin->id) }}"
                                                    class="btn btn-info">{{ $admin->permissions_count }}/Permissions<i
                                                        class="fas fa-user-tie"></i></a></td> 
                                             <td><span @if ($admin->deleted_at) class="badge bg-success"@else class="badge bg-danger" @endif>{{ $admin->trashed() ? 'true' : 'false' }}</span>
                                            </td>
                                            <td>{{ $admin->created_at->diffForHumans() }}</td>
                                            <td>{{ $admin->updated_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    @canany(['Update-Admins'],['Delete-Admins'])

                                                        @can('Update-Admins')
                                                            <a href="{{ route('admin.edit', $admin->id) }}" type="button"
                                                                class="btn btn-info">
                                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                                            </a>
                                                        @endcan


                                                        @can('Delete-Admins')
                                                            @if (!$admin->trashed())
                                                                 @if (Auth::user()->id !== $admin->id) 
                                                                    <a href="#" class="btn btn-danger"
                                                                        onclick="confirmDestroy({{ $admin->id }}, this)"><i
                                                                            class="fas fa-trash"></i></a>
                                                                 @endif
                                                            @endif
                                                        @endcan
                                                    @endcanany

                                                    @if ($admin->trashed())
                                                        <a href="#" class="btn btn-success"
                                                            onclick="restore({{ $admin->id }})"><i
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

                            {{ $admins->links() }}


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
            axios.delete('/cms/admin/admin/' + id + "/restore")
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

            axios.delete('/cms/admin/admin/' + id)
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
