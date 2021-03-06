@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Packages</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Projects</li>
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
                <h3 class="card-title">Projects</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects" id="proj">
                    <thead>
                        <tr>
                            <th class="project-state">Package Id</th>
                            <th class="project-state">Package Name</th>
                            <th class="project-state">Price</th>
                            <th class="project-state">Number of sessions</th>
                            <th class="project-state">Creator</th>
                            <th class="text-center">Actions </th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($packages as $package)
                        <tr id="did{{ $package->id }}">
                            <td class="project-state">{{ $package->id }}</td>
                            <td class="project-state">{{ $package->name }} </td>
                            <td class="project-state">{{ $package->price / 100 }} $ </td>
                            <td class="project-state">{{ $package->sessions_number }}</td>
                            <td class="project-state">{{ $package->user ? $package->user->name : 'Not found' }}
                            </td>
                            <td class="project-actions text-center">
                                <a class="btn btn-success fw-bold"
                                    href="{{ route('trainingPackeges.show_training_package', $package['id']) }}">
                                    Show
                                </a>
                                <a class="btn btn-info mr-1 fw-bold text-white"
                                    href="{{ route('trainingPackeges.editPackege', $package['id']) }}">
                                    Edit
                                <a href="{{ route('PaymentPackage.stripe') }}" class="btn btn-warning text-white fw-bold">Buy
                                </a>
                                @role('admin')
                                <a href="javascript:void(0)" onclick="deletePackage({{ $package->id }});"
                                    class="btn btn-danger fw-bold">Delete</a>
                                @endrole


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
        <div class="text-center">
            {{ $packages->links() }}
        </div>
        <style>
            svg {
                width: 35px;
            }
        </style>

    </div>
    <!-- /.content-wrapper -->



    <script>
        function deletePackage(id) {
            if (confirm("Do you want to delete this record?")) {
                $.ajax({
                    url: '/trainingPackages/' + id,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        $("#did" + id).remove();
                    }
                });
            }
        }
    </script>

@endsection