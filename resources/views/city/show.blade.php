@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Show City</h4>
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
                            @if ($citiesManagers != null)
                            <th class="project-state text-center">ID</th>
                            <th class="project-state text-center">City Name</th>
                            <th class="project-state text-center">Manager Name</th>
                            <th class="project-state text-center">Manager Email</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                        <tr>

                            <td class="project-state text-center">{{$cityData->id}}</td>
                            <td class="project-state text-center">{{$cityData->name}}</td>
                            @if ($citiesManagers == null)
                            <td class="project-state text-center">This city has no Manager</td>
                            <td class="project-state text-center">This city has no Manager </td>
                            @else
                            <td class="project-state text-center">{{$citiesManagers->name}}</td>
                            <td class="project-state text-center">{{$citiesManagers->email}} </td>
                            @endif

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