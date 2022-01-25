@extends('cms.partents')

@section('title', 'Classes')
@section('page-name', 'Index Classes')
@section('main-page', 'Classes')
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
                            <h3 class="card-title">Classes</h3>

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
                            <table class="table table-hover table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Students Count</th>
                                        <th>Active</th>
                                        <th>Is Deleted</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Settings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes as $index => $class)
                                        <tr>
                                            <td><span class="badge bg-dark">{{ $index + 1 }}</span></td>
                                            <td>{{ $class->name }}</td>
                                            <td><span class="badge bg-info">{{ $class->student_count }}
                                                Student/s</span>
                                            </td>
                                            <td><span @if ($class->active) class="badge bg-success" @else class="badge bg-danger" @endif>{{ $class->status }}</span></td>

                                            <td><span @if ($class->deleted_at) class="badge bg-success"@else class="badge bg-danger" @endif>{{ $class->trashed() ? 'true' : 'false' }}</span>
                                            </td>
                                            <td>{{ $class->created_at }}</td>
                                            <td>{{ $class->updated_at }}</td>
                                            <td>
                                                <div class="btn-group">
                                                        <a href="{{ route('class.edit', $class->id) }}" type="button"
                                                            class="btn btn-info"><i class="fas fa-edit"></i></a>

                                                    {{-- <form role="form" method="POST" action="{{ route('cities.destroy',$city->id) }}">
                                                             @csrf
                                                             @method('DELETE')
                                                             <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                        </form> --}}

                                                    {{-- <a href="{{ route('cities.destroy',$city->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}

                                                        @if (!$class->trashed())
                                                            <a href="#" class="btn btn-danger"
                                                                onclick="confirmDestroy({{ $class->id }}, this)"><i
                                                                    class="fas fa-trash"></i></a>
                                                        @endif

                                                    @if ($class->trashed())
                                                        <a href="#" class="btn btn-success"
                                                            onclick="restore({{ $class->id }})"><i
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
                            {{ $classes->links() }}
                            {{-- {{ $cities->render }} --}}
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
            console.log("CITY ID: " + id);

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
            axios.delete('/cms/admin/class/' + id + "/restore")
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
            axios.delete('/cms/admin/class/' + id)
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
