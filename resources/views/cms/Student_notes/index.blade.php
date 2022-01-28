@extends('cms.partents')

@section('title', 'Index Student_notes')
@section('page-name', 'Index Student_notes')
@section('main-page', 'Student_notes')
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
                            <h3 class="card-title">Data Student_notes</h3>
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
                                        <th>Student_name</th>
                                        <th>City</th>
                                        <th>Class</th>
                                        <th>Surah_name</th>
                                        <th>From_Quranic_verse</th>
                                        <th>to_Quranic_verse</th>
                                        <th>name_of_the_revised_surah</th>
                                        <th>From_Quranic_verse_revised</th>
                                        <th>to_Quranic_verse_revised</th>
                                        <th>Deleted_at</th>
                                        <th>Created_at</th>
                                        <th>Updated_at</th>
                                        <th>Action</th>
                                <tbody>
                                    @foreach ($Student_notes as $index => $Student_note)
                                        <tr>
                                            <td><span class="badge bg-dark">{{ $index + 1 }}</span></td>
                                            <td><img src="{{ asset('cms/img/'.$Student_note->image) }}"  height="100" width="100"/></td>
                                            <td><span class="badge bg-info">{{ $Student_note->students->full_name }}</span></td>
                                            <td><span class="badge bg-info">{{ $Student_note->cities->name }}</span></td>
                                            <td><span class="badge bg-dark">{{ $Student_note->classes->name}}</span></td>
                                            <td><span class="badge bg-dark">{{ $Student_note->surahs->name}}</span></td>
                                            <td>{{ $Student_note->From_Quranic_verse }}</td>
                                            <td>{{ $Student_note->to_Quranic_verse }}</td>
                                            <td>{{ $Student_note->name_of_the_revised_surah }}</td>
                                            <td>{{ $Student_note->From_Quranic_verse_revised }}</td>
                                            <td>{{ $Student_note->to_Quranic_verse_revised }}</td>

                                             <td><span @if ($Student_note->deleted_at) class="badge bg-success"@else class="badge bg-danger" @endif>{{ $Student_note->trashed() ? 'true' : 'false' }}</span>
                                            </td>
                                            <td>{{ $Student_note->created_at->diffForHumans() }}</td>
                                            <td>{{ $Student_note->updated_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    @canany(['Update-Admins'],['Delete-Admins'])

                                                        @can('Update-Admins')
                                                            <a href="{{ route('student_notes.edit', $Student_note->id) }}" type="button"
                                                                class="btn btn-info">
                                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                                            </a>
                                                        @endcan


                                                        @can('Delete-Admins')
                                                            @if (!$Student_note->trashed())
                                                                {{-- @if (Auth::user()->id !== $admin->id) --}}
                                                                    <a href="#" class="btn btn-danger"
                                                                        onclick="confirmDestroy({{ $Student_note->id }}, this)"><i
                                                                            class="fas fa-trash"></i></a>
                                                                {{-- @endif --}}
                                                            @endif
                                                        @endcan
                                                    @endcanany

                                                    @if ($Student_note->trashed())
                                                        <a href="#" class="btn btn-success"
                                                            onclick="restore({{ $Student_note->id }})"><i
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

                            {{ $Student_notes->links() }}


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
            axios.delete('/cms/admin/student_notes/' + id + "/restore")
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

            axios.delete('/cms/admin/student_notes/' + id)
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
