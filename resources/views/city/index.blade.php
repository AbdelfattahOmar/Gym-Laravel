@extends('layouts.app')

@section('content')
<<<<<<< HEAD

=======
>>>>>>> ac2e7a6d4b05d3bb56d6a63336f4212729d70e2e
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Cities</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cities</li>
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
                <h3 class="card-title">Cities</h3>
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
                            <th class="project-state"> ID </th>
                            <th class="project-state"> City Name</th>
<<<<<<< HEAD
                            <th class="project-state"> City Manager</th>
                            <th class="project-state"> Action </th>
                            <th class="project-state"></th>
=======
                            <th class="project-state"> City Manager Name</th>
                            <th class="project-state"> Created At</th>
                            <th class="project-state"> Action</th>
>>>>>>> ac2e7a6d4b05d3bb56d6a63336f4212729d70e2e
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
<<<<<<< HEAD


@endsection

@section('scripts')
<script type="text/javascript">
$(function() {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('city.index') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'Manager Name',
                name: 'Manager Name'
            },
            {
                data: 'created_at',
                name: 'created_at'
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
=======
@endsection
@section('scripts')
<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('city.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'Manager Name',
                    name: 'Manager Name'
                },
                {
                    data: 'Created At',
                    name: 'Created At'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });

    });
>>>>>>> ac2e7a6d4b05d3bb56d6a63336f4212729d70e2e
</script>
@endsection