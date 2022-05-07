@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Show Training Package</h4>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">

            <div class="card-body p-0">
                <table class="table table-striped projects">
                <thead>
                        <tr>
                            <th class="project-state text-center">Package ID</th>
                            <th class="project-state text-center">Package Name</th>
                            <th class="project-state text-center">Package Price</th>
                            <th class="project-state text-center">Number of sessions</th>
                            <th class="project-state text-center">Creator</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td class="project-state text-center">{{ $package->id }}</td>
                            <td class="project-state text-center">{{ $package->name }}</td>
                            <td class="project-state text-center">{{ $package->price }}</td>
                            <td class="project-state text-center">{{ $package->sessions_number }}</td>
                            <td class="project-state text-center">{{ $package->user->name }}</td>
                        </tr>
                    </tbody>
                    <tbody>
                   
                       
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
</div>
<!-- /.content-wrapper -->
@endsection


















@extends('layouts.app')
@section('content')
    <div class="content-wrapper pb-4">
        <div class="container-fluid pt-5">
            <div class="row align-self-center d-flex">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-12">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $package->name }}</h3>
                                    <p>Name</p>
                                </div>
                                <div class="icon">
                                    <i class="fas text-white" style="font-size: 50px !important"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            {{-- <a href="{{ route('gym.list') }}"> --}}
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $package->price }}</h3>
                                    <p>Price</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dumbbell text-white" style="font-size: 50px !important"></i>
                                </div>
                            </div>
                            {{-- </a> --}}
                        </div>
                        <div class="col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $package->sessions_number }} <sup style="font-size: 20px"></sup></h3>
                                    <p>Sessions Number</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user text-dark" style="font-size: 50px !important"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection