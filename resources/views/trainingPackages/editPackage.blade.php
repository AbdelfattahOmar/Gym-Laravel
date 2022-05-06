@extends('layouts.app')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pb-4">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Package</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Package</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <section class="content">
    
        <form action="{{route('trainingPackeges.update_package',[$package['id']])}}" method="POST" enctype="multipart/form-data" class="w-75 m-auto">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" value="{{$package->name}}" name="name">
                                <label for="day">Price</label>
                                <input type="text" id="price" class="form-control" value="{{$package->price}}" name="price">
                                <label for="sessions">Sessions Number</label>
                                <input type="text" id="sessions" class="form-control" value="{{$package->sessions_number}}" name="sessions_number">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{route('trainingPackeges.listPackeges')}}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Update" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>
@endsection