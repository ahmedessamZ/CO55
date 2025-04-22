@extends('ui_layout')
@section('content')

{{--LOCATIONS--}}
<div class="container">
    <div class="d-flex justify-content-center my-5">
        <div class="position-relative">
            <h2 class=" mt-0 head-h-h text-uppercase">LOCATIONS</h2>
            <div class="position-absolute border-small-dot-new"></div>
            <div class="position-absolute border-small-line w-100"></div>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach($locations as $location)
        <div class="mx-3 col-lg-4 col-md-6 col-12 d-flex flex-column">
            <div class="position-relative">
                <img class="location_image w-100 mx-auto" src="{{asset('images/'.$location->image)}}" alt="">
            </div>
            <div class="position-relative mb-4">
                <h2 class="mt-3 text-uppercase">{{$location->title}}</h2>
                <div class="position-absolute border-small-dot-new"></div>
                <div class="position-absolute border-small-line w-50"></div>
            </div>
            <p>{{$location->location}}</p>
            <a href="{{ url('locations/'.$location->id)}}" class="btn blue-bg mt-auto mb-5 d-block text-white">Explore Branch</a>
        </div>
        @endforeach
    </div>
</div>

@stop
