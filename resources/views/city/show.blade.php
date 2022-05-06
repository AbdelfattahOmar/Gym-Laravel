@extends('layouts.app')
@section('content')
<div class="content-wrapper pb-4">
    <div class="container-fluid pt-5">
        <div class="row align-self-center d-flex">
            <div class="col-6 bg-light small-box media text-center">
                <div>
                    <div class="inner p-2">
                        @if ($citiesManagers == null)
                        <figure class="mt-5">
                            <i class="fas fa-user-tie" style="font-size: 100px !important"></i>
                            <h3>This city have no city manager <sup style="font-size: 20px"></sup></h3>
                        </figure>
                        @else
                        <figure class="mt-3">
                            <img alt="Avatar" src="{{ $citiesManagers->profile_image }}"
                                style=" vertical-align: middle;width: 150px; height: 150px;border-radius: 50%;">
                        </figure>
                        <h3>ID = {{ $citiesManagers->id }} <sup style="font-size: 20px"></sup></h3>
                        <h3>{{ $citiesManagers->name }} <sup style="font-size: 20px"></sup></h3>
                        <h3>{{ $citiesManagers->email }} <sup style="font-size: 10px"></sup></h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection