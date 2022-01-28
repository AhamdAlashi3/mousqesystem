@extends('cms.partents')

@section('title', 'Index Leader')
@section('page-name', 'Index Leader')
@section('main-page', 'Leader')
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
                            <h3 class="card-title">Data Leader</h3>
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
                                        <th>Deleted_at</th>
                                        <th>Created_at</th>
                                        <th>Updated_at</th>
                                        <th>Action</th>
                                <tbody>
                                    @foreach ($leaders as $index => $leader)
                                        <tr>
                                            <td><span class="badge bg-dark">{{ $index + 1 }}</span></td>
                                            <td><img src="{{ asset('cms/img/'.$leader->image) }}"  height="100" width="100"/></td>
                                            <td>{{ $leader->first_name }}</td>
                                            <td>{{ $leader->last_name }}</td>
                                            <td><span class="badge bg-info">{{ $leader->cities->name }}</span></td>
                                            <td>{{ $leader->email }}</td>
                                            <td>{{ $leader->phone }}</td>
                                            <td><span class="badge bg-success">{{ $leader->gender_title }}</span></td>
                                             {{-- <td><a href="{{ route('leader.permission.index', $leader->id) }}"
                                                    class="btn btn-info">{{ $leader->permissions_count }}/Permissions<i
                                                        class="fas fa-user-tie"></i></a></td> --}}
                                             <td><span @if ($leader->deleted_at) class="badge bg-success"@else class="badge bg-danger" @endif>{{ $leader->trashed() ? 'true' : 'false' }}</span>
                                            </td>
                                            <td>{{ $leader->created_at->diffForHumans() }}</td>
                                            <td>{{ $leader->updated_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    @canany(['Update-Student_notes'],['Delete-Student_notes'])

                                                        @can('Update-Student_notes')
                                                            <a href="{{ route('leader.edit', $leader->id) }}" type="button"
                                                                class="btn btn-info">
                                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                                            </a>
                                                        @endcan


                                                        @can('Delete-Student_notes')
                                                            @if (!$leader->trashed())
                                                                {{-- @if (Auth::user()->id !== $leader->id) --}}
                                                                    <a href="#" class="btn btn-danger"
                                                                        onclick="confirmDestroy({{ $leader->id }}, this)"><i
                                                                            class="fas fa-trash"></i></a>
                                                                {{-- @endif --}}
                                                            @endif
                                                        @endcan
                                                    @endcanany

                                                    @if ($leader->trashed())
                                                        <a href="#" class="btn btn-success"
                                                            onclick="restore({{ $leader->id }})"><i
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

                            {{ $leaders->links() }}


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
            axios.delete('/cms/admin/leader/' + id + "/restore")
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

            axios.delete('/cms/admin/leader/' + id)
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
