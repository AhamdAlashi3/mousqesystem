@extends('cms.partents')

@section('title', 'Cities')
@section('page-name', 'Show Cities')
@section('main-page', 'Cities')
@section('sub-page', 'Show')

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
                            <h3 class="card-title">Cities</h3>

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
                                        <th>Admins Count</th>
                                        <th>Schools Count</th>
                                        <th>Students Count</th>
                                        <th>Teachers Count</th>
                                        <th>Is Deleted</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Settings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cities as $index => $city)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $city->name }}</td>
                                            <td><span @if ($city->active) class="badge bg-success" @else class="badge bg-danger" @endif>{{ $city->status }}</span></td>
                                            {{-- <td>{{ $city->status }}</td> --}}
                                            {{-- <td><span class="badge bg-info">{{ $city->admins_count }} admin/s</span></td>

                                            <td><span class="badge bg-info">{{ $city->schools_count }} school/s</span>
                                            </td>
                                            <td><span class="badge bg-info">{{ $city->students_count }}
                                                Student/s</span>
                                            </td>

                                            <td><span class="badge bg-info">{{ $city->teachers_count }} teacher/s</span>
                                            </td>
                                            <td><span @if ($city->deleted_at) class="badge bg-success"@else class="badge bg-danger" @endif>{{ $city->trashed() ? 'true' : 'false' }}</span>
                                            </td> --}}
                                            <td>{{ $city->created_at }}</td>
                                            <td>{{ $city->updated_at }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $cities->links() }}
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


