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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="project-state">{{$gymManager->id}}</td>
                            <td class="project-state">{{$gymManager->name}}</td>
                            <td class="project-state">{{$gymManager->email}}</td>
                            <td class="project-state">
                                <img alt="Avatar" class="table-avatar" style="width:50px" src="{{ asset($gymManager->profile_image) }}"></td>
                            <td class="project-state">{{$gymManager->national_id}}</td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>


@endsection