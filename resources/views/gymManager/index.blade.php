@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Gym Managers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Gym Managers</li>
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
                <h3 class="card-title">Gym Managers</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0 ">
                <table class="table table-striped data-table" id="proj">
                    <thead>
                        <tr>
                            <th class="project-state">ID</th>
                            <th class="project-state"> Gym Manager Name</th>
                            <th class="project-state">Email</th>
                            <th class="project-state">Profile Picture</th>
                            <th class="project-state">National ID</th>
                            <th class="project-state">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allGymManagers as $GymManager)
                        <tr>
                            <td class="project-state">{{$GymManager->id}}</td>
                            <td class="project-state">{{$GymManager->name}}</td>
                            <td class="project-state">{{$GymManager->email}}</td>
                            <td class="project-state">
                                <img alt="Avatar" class="table-avatar" src="{{ asset($GymManager->profile_image) }}"></td>
                            <td class="project-state">{{$GymManager->national_id}}</td>
                            <td class="project-actions text-center">
                                <a class="btn btn-success btn-sm" href="#"> View </a>
                                <a class="btn btn-info btn-sm" href="#"> Edit </a>
                                <a class="btn btn-danger btn-sm " href="#"> Delete </a>
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


@endsection

