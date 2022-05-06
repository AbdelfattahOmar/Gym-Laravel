@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Show Gym Manager</h4>
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
                            <th class="project-state text-center">ID</th>
                            <th class="project-state text-center"> City Manager Name</th>
                            <th class="project-state text-center">Email</th>
                            <th class="project-state text-center">Profile Picture</th>
                            <th class="project-state text-center">National ID</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td class="project-state text-center">{{$singleUser->id}}</td>
                            <td class="project-state text-center">{{$singleUser->name}} </td>
                            <td class="project-state text-center">{{$singleUser->email}} </td>
                            <td class="project-state text-center"><img alt="Avatar" style="width:50px" src="{{asset($singleUser->profile_image)}}"></td>
                            <td class="project-state text-center">{{ $singleUser->national_id }} </td>
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

