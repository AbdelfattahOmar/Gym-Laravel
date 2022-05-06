@extends('layouts.app')

@section('content')

<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
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
                            <th class="project-state ">ID</th>
                            <th class="project-state "> Gym Manager Name</th>
                            <th class="project-state ">Email</th>
                            <th class="project-state ">Profile Picture</th>
                            <th class="project-state ">National ID</th>
                            <th class="project-state text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>


@endsection

@section('scripts')
<script type="text/javascript">
$(function() {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('gymManager.index') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'profile_image',
                name: 'profile_image',
                render: function(data, type, full, meta) {
                    return "<img src=\"" + (data[0] == 'h' ? data : "/" + data) +
                        "\" width=\"50\"/>";
                }
            },
            {
                data: 'national_id',
                name: 'national_id'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
});

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
</script>
@endsection