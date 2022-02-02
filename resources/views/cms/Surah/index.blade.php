@extends('cms.partents')

@section('title', 'Surah')
@section('page-name', 'Index Surah')
@section('main-page', 'Surah')
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
                            <a href="{{ route('surah.create') }}"
                                class="btn btn-info"><i
                                class="fas fa-plus"></i> Add Surah </a>
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
                                        <th>Active</th>
                                        <th>Is Deleted</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Settings</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Active</th>
                                        <th>Is Deleted</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Settings</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($surahs as $index => $surah)
                                        <tr>
                                            <td><span class="badge bg-dark">{{ $index + 1 }}</span></td>
                                            <td>{{ $surah->name }}</td>
                                            <td><span @if ($surah->active) class="badge bg-success" @else class="badge bg-danger" @endif>{{ $surah->status }}</span></td>
                                            <td><span @if ($surah->deleted_at) class="badge bg-success"@else class="badge bg-danger" @endif>{{ $surah->trashed() ? 'true' : 'false' }}</span>
                                            </td>
                                            <td>{{ $surah->created_at }}</td>
                                            <td>{{ $surah->updated_at }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    @canany(['Update-Surahs'],['Delete-Surahs'])
                                                        @can('Update-Surahs')
                                                            <a href="{{ route('surah.edit', $surah->id) }}" type="button"
                                                                class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                        @endcan

                                                        @can('Delete-Surahs')
                                                            @if (!$surah->trashed())
                                                                <a href="#" class="btn btn-danger"
                                                                    onclick="confirmDestroy({{ $surah->id }}, this)"><i
                                                                        class="fas fa-trash"></i></a>
                                                            @endif
                                                        @endcan
                                                    @endcanany

                                                    @if ($surah->trashed())
                                                        <a href="#" class="btn btn-success"
                                                            onclick="restore({{ $surah->id }})"><i
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
                            {{ $surahs->links() }}
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
            axios.delete('/cms/admin/surah/' + id + "/restore")
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
            axios.delete('/cms/admin/surah/' + id)
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
