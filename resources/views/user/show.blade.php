@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                <h3 class="card-title">User</h3>
            </div>
            <div class="card-body p-0 ">
                <table class="table table-striped data-table" id="proj">
                    <thead>
                        <tr>
                            <th class="project-state">ID</th>
                            <th class="project-state">Name</th>
                            <th class="project-state">Email</th>
                            <th class="project-state ">Profile Image</th>
                            <th class="project-state ">National ID</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="project-state">{{$user->id}}</td>
                            <td class="project-state">{{$user->name}}</td>
                            <td class="project-state">{{$user->email}}</td>
                            <td class="project-state">
                            @if ($user->profile_image == null)
                            <img src="{{ asset('dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
                            @else
                            <img alt="Avatar" class="table-avatar" style="width:50px" src="{{ asset($user->profile_image) }}">
                            @endif
                           </td>
                                </td>
                            <td class="project-state">{{$user->national_id}}</td>


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