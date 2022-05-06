@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gyms Show</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Gyms</li>
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
                <h3 class="card-title">All Gyms</h3>
            </div>
            <div class="card-body p-0 ">
                <table class="table table-striped data-table" id="proj">
                    <thead>
                        <tr>
                            <th class="project-state text-center">ID</th>
                            <th class="project-state text-center">Gyms Name</th>
                            <th class="project-state text-center">Gym City</th>
                            <th class="project-state text-center">Created at</th>
                            <th class="project-state text-center">Gyms Cover Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="project-state text-center">{{$singleGym->id}}</td>
                            <td class="project-state text-center">{{$singleGym->name}}</td>
                            <td class="project-state text-center">{{$singleGym->city->name}}</td>
                            <td class="project-state text-center">{{$singleGym->created_at}}</td>
                            <td class="project-state text-center">
                                <img alt="Avatar" class="table-avatar" style="width:50px" src="{{ asset($singleGym->cover_image) }}"></td>
                            
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















