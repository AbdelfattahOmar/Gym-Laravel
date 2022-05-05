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
                            <th class="project-state text-center">ID</th>
                            <th class="project-state text-center"> Gym Manager Name</th>
                            <th class="project-state text-center">Email</th>
                            <th class="project-state text-center">Profile Picture</th>
                            <th class="project-state text-center">National ID</th>
                            <th class="project-state text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allGymManagers as $GymManager)
                        <tr>
                            <td class="project-state text-center">{{$GymManager->id}}</td>
                            <td class="project-state text-center">{{$GymManager->name}}</td>
                            <td class="project-state text-center">{{$GymManager->email}}</td>
                            <td class="project-state">
                                <img alt="Avatar" class="table-avatar" style="width:100px" src="{{ asset($GymManager->profile_image) }}"></td>
                            <td class="project-state text-center">{{$GymManager->national_id}}</td>
                            <td class="project-actions text-center">
                                <a class="btn btn-success fw-bold mr-2"  href="{{ route('gymManager.show',['id' => $GymManager['id']]) }}"> View </a>
                                <a class="btn btn-info fw-bold mr-2" style="color:#fff" href="{{ route('gymManager.edit',['id' => $GymManager['id']]) }}"> Edit </a>
                                <form action="{{ route('gymManager.delete',['id' => $GymManager['id']]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onClick="if(!confirm('Are you sure?')){return false;}" type="submit" class="btn btn-danger fw-bold mr-2">Delete</button>
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


@endsection

