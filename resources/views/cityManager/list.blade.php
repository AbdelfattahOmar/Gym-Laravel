@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All City Managers</h1>
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
                            <th class="project-state">ID</th>
                            <th class="project-state"> City Manager Name</th>
                            <th class="project-state">Email</th>
                            <th class="project-state">Profile Picture</th>
                            <th class="project-state">National ID</th>
                            <th class="project-state">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr id="did{{ $user->id }}">
                            <td class="project-state">{{ $user->id }}</td>
                            <td class="project-state">{{ $user->name }} </td>
                            <td class="project-state">{{ $user->email }} </td>
                            <td class="project-state"><img alt="Avatar" style="width:50px"
                                    src="{{ asset($user->profile_image) }}"></td>
                            <td class="project-state">{{ $user->national_id }} </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-success fw-bold mr-2 ml-5"
                                    href="{{ route('cityManager.show', $user['id']) }}">
                                    View
                                </a>
                                <a class="btn btn-info fw-bold mr-2 text-white"
                                    href="{{ route('cityManager.edit', $user['id']) }}">
                                    Edit
                                </a>

<<<<<<< HEAD
        
                                    <form action="{{route ('cityManager.delete',['id' => $user['id']]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onClick="if(!confirm('Is the form filled out correctly?')){return false;}" type="submit" class="btn btn-danger mr-2">Delete</button>
                                        </form>
=======
                                <a href="javascript:void(0)" onclick="deletecityManager({{ $user->id }})"
                                    class="btn btn-danger fw-bold mr-2">Delete</a>
>>>>>>> 9090dc871789e802640c1db5622891cf4756d350

                                <a href="javascript:void(0)" onclick="banUser({{ $user->id }})" class="btn btn-dark "><i
                                        class="fa fa-user-lock"></i></a>

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
<<<<<<< HEAD
<!-- <div class="text-center">
    {{ $users->links() }}
</div>
<style>
svg {
    width: 35px;
}
</style> -->
=======

<<<<<<< HEAD
<div class="text-center">
    {{ $users->links() }}
</div>
<style>
svg {
    width: 35px;
}
</style>
=======

>>>>>>> 47399b051d1bd613a05b1c265bf26982fccd205c
>>>>>>> 9090dc871789e802640c1db5622891cf4756d350
< !-- /.content-wrapper -->
    <script>
    function banUser(id) {
        if (confirm("Do you want to ban this user?")) {
            console.log(id)
            $.ajax({

                    url: '/banUser/' + id,
                    type: 'get',
                    data: {
                        _token: $("input[name=_token]").val()
                    }

                    ,
                    success: function(response) {
                        $("#did" + id).remove();
                    }
                }

            );
        }
    }

 
    </script>@endsection