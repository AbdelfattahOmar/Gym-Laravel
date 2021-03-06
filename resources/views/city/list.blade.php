@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
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
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects" id="proj">
                    <thead>
                        <tr>
                            <th class="project-state"> ID </th>
                            <th class="project-state"> City Name</th>
                            <th class="project-state"> City Manager Name</th>
                            <th class="project-state">Created at</th>
                            <th class="project-state">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allCities as $city)
                        <tr id="cid{{ $city->id }}">

                            <td class="project-state">{{ $city->id }}</td>
                            <td class="project-state">{{ $city->name }}</td>
                            @if ($city->manager == null)
                            <td class="project-state">This city has no Manager</td>
                            @else
                            <td class="project-state">{{ $city->manager->name }}</td>
                            @endif
                            <td class="project-state">{{ $city->created_at->format('d - M - Y') }}</td>
                            <td class="project-actions project-state">
                                <a class="btn btn-success fw-bold mr-2" href=" {{ route('city.show', $city->id) }}">

                                    View
                                </a>
                                <a style="color:#fff" class="btn btn-info fw-bold mr-2"
                                    href="{{ route('city.edit', $city->id) }}">
                                    Edit
                                </a>

                                <form action="{{ route('city.destroy',['id' => $city['id']]) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onClick="if(!confirm(' Are you sure?')){return false;}" type="submit"
                                        class="btn btn-danger fw-bold mr-2">Delete</button>
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
<div class="text-center">
    {{ $allCities->links() }}
</div>
<style>
svg {
    width: 35px;
}
</style>
<!-- /.content-wrapper -->
@endsection