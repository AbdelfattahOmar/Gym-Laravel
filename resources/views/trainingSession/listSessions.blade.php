@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Sessions</h1>
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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Projects</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects" id="proj">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Session Name</th>
                            <th>Day</th>
                            <th>Starts At</th>
                            <th>Finishes At</th>
                            <th>Actions </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainingSessions as $index => $trainingSession)
                        <tr id="did{{ $trainingSession->id }}" class="text-center">
                            <td>{{ $trainingSession->id }}</td>
                            <td>{{ $trainingSession->name }} </td>
                            <td>{{ $trainingSession->day }} </td>
                            <td>{{ $trainingSession->starts_at }}</td>
                            <td>{{ $trainingSession->finishes_at }}</td>

                            <td class="project-actions text-center">
                                <a class="btn btn-success fw-bold"
                                    href="{{ route('trainingSession.show_training_session', $trainingSession['id']) }}">

                                    View</i>
                                </a>
                                <a class="btn btn-info fw-bold text-white"
                                    href="{{ route('trainingSession.edit_training_session', $trainingSession['id']) }}">
                                    Edit</a>


                                <form action="{{ route('trainingSession.deleteSession', $trainingSession['id']) }}"
                                    method="post" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure, you want Delete?')"
                                        class="btn btn-danger fw-bold">Delete</i></button>


                                </form>

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
<!-- /.content-wrapper -->



<div class="text-center">
    {{ $trainingSessions->links() }}
</div>
<style>
svg {
    width: 35px;
}
</style>

@endsection