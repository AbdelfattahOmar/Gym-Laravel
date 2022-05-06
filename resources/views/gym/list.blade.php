@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Gyms</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Gyms</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gyms</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects" id="proj">
                        <thead>
                            <tr>
                                <th class="project-state">id</th>
                                <th class="project-state">Gyms Name</th>
                                <th class="project-state">Gym City</th>
                                <th class="project-state">Created at</th>
                                <th class="project-state">Gyms Cover Image</th>
                                <th class="project-state text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gyms as $gym)
                                <tr id="gid{{ $gym->id }}">
                                    <td class="project-state">{{ $gym->id }}</td>
                                    <td class="project-state">{{ $gym->name }}</td>
                                    <td class="project-state">

                                        @if ($gym->city == null)
                                            <span class="project-state">this gym has no city</span>
                                        @else
                                            <span class="project-state">{{ $gym->city->name }}</span>
                                        @endif
                                    </td>
                                    <td class="project-state">{{ $gym->created_at->format('d - M - Y') }}</td>
                                    <td class="project-state">
                                        <img alt="Avatar" style="width:50px" src="{{ asset($gym->cover_image) }}">
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success fw-bold mr-2" href="{{ route('gym.show', $gym['id']) }}">
                                          View
                                        </a>
                                        <a class="btn btn-info fw-bold mr-2 text-white"
                                            href="{{ route('gym.edit', $gym['id']) }}">
                                        Edit</a>
                                        <a href="javascript:void(0)" onclick="deleteGym({{ $gym->id }})"
                                            class="btn btn-danger fw-bold mr-2">Delete</a>
                                    </td>


                                </tr>
                            @endforeach


                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>
    <div class="text-center">
        {{ $gyms->links() }}
    </div>
    <style>
    svg {
        width: 35px;
    }
    </style>
    <!-- /.content-wrapper -->
    <script>
        function deleteGym(id) {
            if (confirm("Do you want to delete this gym?")) {
                $.ajax({
                    url: '/gym/' + id,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        $("#gid" + id).remove();
                    }
                });
            }
        }
    </script>
@endsection
